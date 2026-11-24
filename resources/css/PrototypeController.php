<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrototypeController extends Controller
{
    public function signIn(): RedirectResponse
    {
        return redirect()->route('student.dashboard');
    }

    public function staffDashboard(): View
    {
        return view('pages.staff.dashboard');
    }

    public function staffProject(string $project): View
    {
        return view('pages.staff.project', ['projectSlug' => $project]);
    }

    public function createProject(): View
    {
        return view('pages.staff.create-project');
    }

    public function publishProject(): RedirectResponse
    {
        return redirect()->route('staff.projects.publishing');
    }

    public function publishingProject(): View
    {
        return view('pages.staff.publishing');
    }

    public function studentDashboard(): View
    {
        return view('pages.student.project');
    }
}
