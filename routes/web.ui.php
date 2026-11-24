<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\Project\ProjectController;

Route::prefix('ui')->name('ui.')->group(function () {

    Route::middleware(['auth', 'verified'])->group(function () {

        Route::middleware('can:staff-only')->group(function () {

            Route::get('/staff', [ProjectController::class, 'uiDashboard'])
                ->name('staff.dashboard');

            Route::view('/staff/projects/create', 'ui.staff.create-project')
                ->name('staff.projects.create');

            Route::post(
                '/staff/projects',
                fn() =>
                redirect()->route('ui.staff.projects.publishing')
            )->name('staff.projects.publish');

            Route::view('/staff/projects/publishing', 'ui.staff.publishing')
                ->name('staff.projects.publishing');

            Route::view('/staff/projects/{projectSlug}', 'ui.staff.project')
                ->name('staff.projects.show');
        });
        Route::get('/student', [ProjectController::class, 'uiDashboard'])
            ->name('student.dashboard');
    });
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');

    Route::view('/', 'ui.sign-in')->name('sign-in');

    Route::post('/sign-in', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('sign-in.submit');
});
