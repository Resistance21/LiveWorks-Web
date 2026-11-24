<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectShowController extends Controller
{
    public function __invoke(Project $project): JsonResponse
    {
        $project->load([
            'assessment.unit:id,unit_code,unit_name',
            'members.user:id,name',
            'projectArchiveLatest',
            'projectDocument',
        ]);

        $archive = $project->projectArchiveLatest;

        return response()->json([
            'id' => $project->id,
            'name' => $project->name,
            'status' => $project->status,
            'description' => $project->description,
            'unit' => [
                'code' => $project->assessment->unit->unit_code,
                'name' => $project->assessment->unit->unit_name,
            ],
            'assessment' => [
                'id' => $project->assessment->id,
                'name' => $project->assessment->name,
                'year' => $project->assessment->year,
            ],
            'members' => $project->members->map(fn ($m) => [
                'name' => $m->user->name,
                'role' => $m->role,
            ]),
            'archive' => $archive ? [
                'id' => $archive->id,
                'file_name' => $archive->file_name,
                'version_number' => $archive->version_number,
            ] : null,
            'documents' => $project->projectDocument->map(fn ($d) => [
                'id' => $d->id,
                'file_name' => $d->file_name,
                'type' => $d->type,
            ]),
        ]);
    }
}