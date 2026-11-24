<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Assessment\AdminAssessmentCreateController;
use App\Http\Controllers\Admin\Assessment\AdminAssessmentEditController;
use App\Http\Controllers\Admin\Assessment\AdminAssessmentStoreController;
use App\Http\Controllers\Admin\Assessment\AdminAssessmentUpdateController;
use App\Http\Controllers\Admin\Unit\AdminUnitCreateController;
use App\Http\Controllers\Admin\Unit\AdminUnitEditController;
use App\Http\Controllers\Admin\Unit\AdminUnitStoreController;
use App\Http\Controllers\Admin\Unit\AdminUnitUpdateController;
use App\Http\Controllers\Admin\User\AdminBulkUserCreateController;
use App\Http\Controllers\Admin\User\AdminBulkUserStoreController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        Route::get('users/bulk-create', AdminBulkUserCreateController::class)
            ->name('users.bulk-create');
        Route::post('users/bulk-create', AdminBulkUserStoreController::class)
            ->name('users.bulk-store');

        Route::resource('users', UserManagementController::class);


        Route::prefix('unit')->name('unit.')->group(function () {
            Route::post('create', AdminUnitStoreController::class)
            ->name('store');
    
            Route::get('create', AdminUnitCreateController::class)
            ->name('create');
    
            Route::get('{unit}/edit', AdminUnitEditController::class)
            ->name('edit');
    
            Route::post('{unit}/edit', AdminUnitUpdateController::class)
            ->name('update');

        });

        Route::prefix('assessment')->name('assessment.')->group(function (){
            Route::get('{unit}/create', AdminAssessmentCreateController::class)
            ->name('create');

            Route::post('{unit}/create', AdminAssessmentStoreController::class)
            ->name('store');

            Route::get('{unit}/edit', AdminAssessmentEditController::class)
            ->name('edit');

            Route::post('{unit}/edit', AdminAssessmentUpdateController::class)
            ->name('update');
        });

    });
