<?php

namespace App\Http\Controllers\Staff\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;

class StaffUnitEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Unit $unit)
    {
        return view('staff.unit.edit', compact('unit'));
    }
}
