<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminUnitEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Unit $unit)
    {
        return view('admin.unit.edit', compact('unit'));
    }
}
