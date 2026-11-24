<?php

namespace App\Http\Controllers\Staff\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class StaffAssessmentEditController extends Controller
{
    public function __invoke(Unit $unit)
    {
        $assessmentsByYear = $unit->assessments()
            ->get()
            ->groupBy('year');
            
        return view('staff.assessment.edit', compact('unit', 'assessmentsByYear'));
    }
}
