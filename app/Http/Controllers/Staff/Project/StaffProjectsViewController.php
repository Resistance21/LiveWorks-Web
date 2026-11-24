<?php

namespace App\Http\Controllers\Staff\Project;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class StaffProjectsViewController extends Controller
{
    public function __invoke()
    {
        $units = Unit::with('assessments.projects')->get();
        $units->each(function ($unit) {
            $unit->assessmentsByYear = $unit->assessments->groupBy('year');
        });
        //dd($units);
        //dd($units->first()->assessments->first()->projects);
        return view('staff.projects.index', compact('units'));
    }
}
