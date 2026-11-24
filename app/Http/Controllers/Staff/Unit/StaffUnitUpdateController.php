<?php

namespace App\Http\Controllers\Staff\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\Unit\StaffUnitUpdateRequest;
use App\Models\Unit;

class StaffUnitUpdateController extends Controller
{
    public function __invoke(StaffUnitUpdateRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        return redirect()->route('admin.index')
            ->with('status', 'unit updated');
    }
}
