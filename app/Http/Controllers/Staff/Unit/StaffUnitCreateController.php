<?php

namespace App\Http\Controllers\Staff\Unit;

use App\Http\Controllers\Controller;

class StaffUnitCreateController extends Controller
{
    public function __invoke()
    {
        return view('staff.unit.create');
    }
}
