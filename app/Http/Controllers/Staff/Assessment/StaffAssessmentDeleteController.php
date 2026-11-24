<?php

namespace App\Http\Controllers\Staff\Assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;

class StaffAssessmentDeleteController extends Controller
{
    public function __invoke(Assessment $assessment)
    {
        if ($assessment->projects()->exists()) {
            return redirect()->route('staff.index')
                ->with('status', 'This assessment cannot be deleted because it has projects attached.');
        }
        
        $assessment->delete();

        return redirect()->route('staff.index')
            ->with('status', 'assessment deleted');
    }
}
