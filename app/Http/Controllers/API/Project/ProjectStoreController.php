<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Project;
use App\Models\ProjectArchive;
use App\Models\ProjectDocument;
use App\Models\ProjectMember;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectStoreController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'assessment_id' => ['required', 'integer', 'exists:assessments,id'],
            'project' => ['required', 'file', 'mimes:zip', 'max:10240'],
            'project_description' => ['nullable', 'string', 'max:256'],
            'team_members' => ['nullable', 'array'],
            'team_members.*' => ['integer', 'exists:users,id'],
            'documentation' => ['nullable', 'array'],
            'documentation.*' => ['file', 'mimetypes:text/plain,application/pdf', 'max:10240'],
        ]);

        $assessment = Assessment::findOrFail($validated['assessment_id']);
        $folder = "{$assessment->unit_id}/{$assessment->year}/{$assessment->id}";

        $project = DB::transaction(function () use ($request, $validated, $assessment, $folder) {
            $project = Project::create([
                'name' => $assessment->name,
                'assessment_id' => $assessment->id,
                'status' => 'active',
                'description' => $validated['project_description'] ?? null,
            ]);

            ProjectMember::create([
                'project_id' => $project->id,
                'user_id' => $request->user()->id,
                'role' => 'leader',
            ]);

            foreach ($validated['team_members'] ?? [] as $memberId) {
                ProjectMember::create([
                    'project_id' => $project->id,
                    'user_id' => $memberId,
                    'role' => 'member',
                ]);
            }

            $zip = $request->file('project');
            $zipName = $zip->getClientOriginalName();
            $zipPath = $zip->storeAs("{$folder}/{$project->id}", $zipName, 'documents');

            ProjectArchive::create([
                'project_id' => $project->id,
                'file_path' => $zipPath,
                'file_name' => $zipName,
                'version_number' => 1,
            ]);

            foreach ($request->file('documentation', []) as $document) {
                $docName = $document->getClientOriginalName();
                $docPath = $document->storeAs("{$folder}/{$project->id}", $docName, 'documents');

                ProjectDocument::create([
                    'project_id' => $project->id,
                    'file_path' => $docPath,
                    'file_name' => $docName,
                    'type' => 'documentation',
                ]);
            }

            return $project;
        });

        return response()->json([
            'id' => $project->id,
            'message' => 'Project created',
        ], 201);
    }
}
