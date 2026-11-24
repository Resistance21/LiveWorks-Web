<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectIndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $projects = Project::query()
            ->whereHas('members', fn ($q) => $q->where('user_id', $request->user()->id))
            ->with(['assessment.unit:id,unit_code,unit_name', 'projectArchiveLatest'])
            ->latest()
            ->get()
            ->map(fn (Project $p) => [
                'id' => $p->id,
                'name' => $p->name,
                'status' => $p->status,
                'description' => $p->description,
                'unit_code' => $p->assessment->unit->unit_code,
                'year' => $p->assessment->year,
                'latest_archive_version' => $p->projectArchiveLatest?->version_number,
                'created_at' => $p->created_at,
            ]);

        return response()->json($projects);
    }
}
