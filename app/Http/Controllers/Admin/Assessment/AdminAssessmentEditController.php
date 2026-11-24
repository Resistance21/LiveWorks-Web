<?php

namespace App\Http\Controllers\Admin\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminAssessmentEditController extends Controller
{
    public function __invoke(Unit $unit)
    {
        $assessmentsByYear = $unit->assessments()
            ->get()
            ->groupBy('year');
            
        return view('admin.assessment.edit', compact('unit', 'assessmentsByYear'));
    }
}
