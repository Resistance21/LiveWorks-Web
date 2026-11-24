<?php

use App\Http\Controllers\Staff\Assessment\StaffAssessmentCreateController;
use App\Http\Controllers\Staff\Assessment\StaffAssessmentDeleteController;
use App\Http\Controllers\Staff\Assessment\StaffAssessmentEditController;
use App\Http\Controllers\Staff\Assessment\StaffAssessmentStoreController;
use App\Http\Controllers\Staff\Assessment\StaffAssessmentUpdateController;
use App\Http\Controllers\Staff\Project\StaffProjectsViewController;
use App\Http\Controllers\Staff\Unit\StaffUnitCreateController;
use App\Http\Controllers\Staff\Unit\StaffUnitDeleteController;
use App\Http\Controllers\Staff\Unit\StaffUnitStoreController;
use App\Http\Controllers\Staff\Unit\StaffUnitEditController;
use App\Http\Controllers\Staff\Unit\StaffUnitUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','can:staff-only'])
    ->prefix('staff')
    ->name('staff.')
    ->group(function () {
        Route::view('/', 'staff.index')->name('index');

        Route::prefix('unit')->name('unit.')->group(function () {
            Route::get('create', StaffUnitCreateController::class)
                ->middleware('can:unit-add')
                ->name('create');

            Route::post('create', StaffUnitStoreController::class)
                ->middleware('can:unit-add')
                ->name('store');

            Route::get('{unit}/edit', StaffUnitEditController::class)
                ->middleware('can:unit-edit')
                ->name('edit');

            Route::post('{unit}/edit', StaffUnitUpdateController::class)
                ->middleware('can:unit-edit')
                ->name('update');

            Route::post('{unit}/delete', StaffUnitDeleteController::class)
                ->name('delete');

        });

        Route::prefix('project')->name('project.')->group(function () {
            Route::get('/', StaffProjectsViewController::class)
                ->name('show');


        });

        Route::prefix('assessment')->name('assessment.')->group(function (){
            Route::get('{unit}/create', StaffAssessmentCreateController::class)
            ->name('create');

            Route::post('{unit}/create', StaffAssessmentStoreController::class)
            ->name('store');

            Route::get('{unit}/edit', StaffAssessmentEditController::class)
            ->name('edit');

            Route::post('{unit}/edit', StaffAssessmentUpdateController::class)
            ->name('update');

            Route::post('{unit}/delete', StaffAssessmentDeleteController::class)
                ->name('delete');
        });
    });
