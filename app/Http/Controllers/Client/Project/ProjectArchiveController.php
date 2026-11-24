<?php

namespace App\Http\Controllers\Client\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\ProjectArchiveRequest;
use App\Models\ProjectArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ReturnTypeWillChange;

class ProjectArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function download(ProjectArchiveRequest $request, ProjectArchive $projectArchive)
    {      
        //dd($projectArchive);
        return Storage::disk('documents')->download($projectArchive->file_path, $projectArchive->file_name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
