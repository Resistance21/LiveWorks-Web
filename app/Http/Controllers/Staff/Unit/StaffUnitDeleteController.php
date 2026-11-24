<?php

namespace App\Http\Controllers\Staff\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class StaffUnitDeleteController extends Controller
{
    public function __invoke(Unit $unit)
    {
        if ($unit->assessments()->exists()) {
            return redirect()->route('staff.index')
                ->with('status', 'This unit cannot be deleted because it has assessments attached.');
        }
        
        $unit->delete();

        return redirect()->route('staff.index')
            ->with('status', 'unit deleted');
    }
}
