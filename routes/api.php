<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Project\ArchiveDownloadController;
use App\Http\Controllers\API\Project\DocumentDownloadController;
use App\Http\Controllers\API\Project\ProjectIndexController;
use App\Http\Controllers\API\Project\ProjectShowController;
use App\Http\Controllers\API\Project\ProjectStoreController;
use App\Http\Controllers\API\Unit\UnitAssessmentsController;
use App\Http\Controllers\API\Unit\UnitIndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn () => response()->json([
    'message' => 'Hello from the LiveWorks API',
]));

Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());

    Route::get('/units', UnitIndexController::class);
    Route::get('/units/{unit}/assessments', UnitAssessmentsController::class);

    Route::get('/projects', ProjectIndexController::class);
    Route::post('/projects', ProjectStoreController::class);
    Route::get('/projects/{project}', ProjectShowController::class);

    Route::get('/archives/{projectArchive}/download', ArchiveDownloadController::class);
    Route::get('/documents/{projectDocument}/download', DocumentDownloadController::class);
});
