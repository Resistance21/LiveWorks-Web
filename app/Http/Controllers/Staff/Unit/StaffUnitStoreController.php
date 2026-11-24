<?php

namespace App\Http\Controllers\Staff\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Unit\StaffUnitStoreRequest;
use App\Models\Unit;

class StaffUnitStoreController extends Controller
{
    public function __invoke(StaffUnitStoreRequest $request)
    {
        Unit::create($request->validated());

        return redirect()
            ->route('staff.index')
            ->with('status', 'unit created');
    }
}
