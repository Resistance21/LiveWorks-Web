<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\AdminUnitUpdateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminUnitUpdateController extends Controller
{
    public function __invoke(AdminUnitUpdateRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        return redirect()->route('admin.index')
            ->with('status', 'unit updated');
    }
}
