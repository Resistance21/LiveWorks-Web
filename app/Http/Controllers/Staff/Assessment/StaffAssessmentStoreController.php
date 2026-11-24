<?php

namespace App\Http\Controllers\Staff\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Assessment\StaffAssessmentStoreRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class StaffAssessmentStoreController extends Controller
{
    public function __invoke(StaffAssessmentStoreRequest $request, Unit $unit)
    {
        $unit->assessments()->create($request->validated());

        return redirect()->route('staff.index')
            ->with('status', 'Assessment created');
    }
}
