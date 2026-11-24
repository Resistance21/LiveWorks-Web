<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectArchive;
use Illuminate\Support\Facades\Storage;

class ArchiveDownloadController extends Controller
{
    public function __invoke(ProjectArchive $projectArchive)
    {
        $disk = Storage::disk('documents');

        if (! $disk->exists($projectArchive->file_path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return $disk->download($projectArchive->file_path, $projectArchive->file_name);
    }
}