<?php

namespace App\Http\Controllers\API\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectDocument;
use Illuminate\Support\Facades\Storage;

class DocumentDownloadController extends Controller
{
    public function __invoke(ProjectDocument $projectDocument)
    {
        $disk = Storage::disk('documents');

        if (! $disk->exists($projectDocument->file_path)) {
            return response()->json(['message' => 'File not found'], 404);
        }

        return $disk->download($projectDocument->file_path, $projectDocument->file_name);
    }
}