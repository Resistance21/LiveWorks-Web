<?php

namespace App\Http\Controllers\Admin\Assessment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Assessment\AdminAssessmentStoreRequest;
use App\Models\Assessment;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminAssessmentStoreController extends Controller
{
    public function __invoke(AdminAssessmentStoreRequest $request, Unit $unit)
    {
        $unit->assessments()->create($request->validated());

        return redirect()->route('admin.index')
            ->with('status', 'Assessment created');
    }
}
