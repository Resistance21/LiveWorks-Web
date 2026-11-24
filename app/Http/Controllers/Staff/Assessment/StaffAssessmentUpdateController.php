<?php

namespace App\Http\Controllers\Staff\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Assessment\StaffAssessmentUpdateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class StaffAssessmentUpdateController extends Controller
{
    public function __invoke(StaffAssessmentUpdateRequest $request, Unit $unit)
    {
        $unit->assessments()->update($request->validated());

        return redirect()->route('staff.index')
            ->with('status', 'Assessment updated');
    }
}
