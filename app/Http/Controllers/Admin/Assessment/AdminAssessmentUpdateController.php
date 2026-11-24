<?php

namespace App\Http\Controllers\Admin\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Assessment\AdminAssessmentUpdateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminAssessmentUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AdminAssessmentUpdateRequest $request, Unit $unit)
    {
        $unit->assessments()->update($request->validated());

        return redirect()->route('admin.index')
            ->with('status', 'Assessment updated');
    }
}
