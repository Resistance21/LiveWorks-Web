<?php

namespace App\Http\Controllers\Client\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\ProjectCreateRequest;
use App\Http\Requests\client\SelectUnitRequest;
use App\Models\Assessment;
use App\Models\Project;
use App\Models\ProjectArchive;
use App\Models\ProjectDocument;
use App\Models\ProjectMember;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function uiDashboard()
    {
        $projects = Project::query()
            ->whereHas('members', fn ($query) =>
                $query->where('user_id', auth()->id())
            )
            ->with('members.user')
            ->latest()
            ->get()
            ->map(fn (Project $project) => [
                'slug' => $project->id,
                'name' => $project->name,
                'student' => $project->members
                    ->firstWhere('role', 'leader')?->user?->name
                    ?? 'No team leader',
                'status' => $project->status,
            ]);

        $view = request()->routeIs('ui.staff.dashboard')
            ? 'ui.staff.dashboard'
            : 'ui.student.project';

        return view($view, compact('projects'));
    }

    public function create(Unit $unit)
    {
        $assessments = Assessment::where('unit_id', $unit->id)
        ->get(['id','name', 'year'])
        ->groupBy('year');

        $user = Auth::user();

        return view('client.projects.create',compact('unit','assessments', 'user'));
    }

    public function show(Project $project){

        $assessment = $project->assessment()
            ->firstOrFail(['unit_id', 'year', 'name', 'id']);

        //dd($assessment);    
        $unit = $assessment->unit()
            ->firstOrFail(['unit_code']);
        //dd($assessment, $unit);
        
        $projectMembers = $project->members()
            ->with('user:id,name')
            ->get(['role','user_id']);
        //dd($projectMembers);

        $projectArchive = $project->projectArchiveLatest;
        $projectDocuments = $project->projectDocument;
        //dd($projectArchive, $projectDocuments);
        return view('client.projects.show',compact('unit','assessment', 'projectMembers', 'project', 'projectArchive', 'projectDocuments'));
    }

    public function store(ProjectCreateRequest $request, Unit $unit)
    {
        $validated = $request->validated();


        DB::transaction(function () use ($validated, $unit) {

            $assessment = Assessment::findOrFail($validated['name']);

            $project = Project::create([
                'name' => $assessment->name,
                'assessment_id' => $assessment->id,
                'status' => 'active',
                'description' => $validated['project_description']
            ]);

            ProjectMember::create([
                'project_id' => $project->id,
                'user_id' => auth()->id(),
                'role' => 'leader',
            ]);

            if (!empty($validated['team_members'])){
                foreach($validated['team_members'] as $member){
                    ProjectMember::create([
                        'project_id' => $project->id,
                        'user_id' => $member,
                        'role' => 'member',
                    ]);
                }
            }

            $originalName = $validated['project']->getClientOriginalName();
            $path = $validated['project']->storeAs(
                "{$unit->id}/{$validated['year']}/{$assessment->id}/{$project->id}",
                $originalName,
                'documents'
            );

            ProjectArchive::create([
                'project_id' => $project->id,
                'file_path' => $path,
                'file_name' => $originalName,
                'version_number' => 1,
            ]);

            if(!empty($validated['documentation'])){
                foreach($validated['documentation'] as $document){
                    $originalName = $document->getClientOriginalName();
                    $path = $document->storeAs(
                        "{$unit->id}/{$validated['year']}/{$assessment->id}/{$project->id}",
                        $originalName,
                        'documents');

                    ProjectDocument::create([
                        'project_id' => $project->id,
                        'file_path' => $path,
                        'file_name' => $originalName,
                        'type'=>'documentation'
                    ]);
                }
            }
        });

        return view('client.static.dashboard');
    }

    public function selectUnit()
    {
        $units = Unit::all();
        return view('client.projects.select-unit', compact('units'));
    }

    public function storeSelectedUnit(SelectUnitRequest $request){
        $validated = $request->validated();

        return redirect()->route('project.create', $validated['unit_id']);
    }
}
