<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\Project\ProjectArchiveController;
use App\Http\Controllers\Client\Project\ProjectController;
use App\Http\Controllers\Client\Project\ProjectDocumentsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');

    Route::prefix('project')->name('project.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');

        Route::get('/{unit}/create', [ProjectController::class, 'create'])->name('create');

        Route::post('/{unit}/create', [ProjectController::class, 'store'])->name('store');

        Route::get('/select-unit', [ProjectController::class, 'selectUnit'])->name('select-unit');

        Route::post('/select-unit', [ProjectController::class, 'storeSelectedUnit'])->name('select-unit');
        
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show');

        Route::get('/archive/{projectArchive}/download', [ProjectArchiveController::class, 'download'])->name('projectArchive-download');

        Route::get('/document/{projectDocument}/download', [ProjectDocumentsController::class, 'download'])->name('projectDocument-download');



    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});
