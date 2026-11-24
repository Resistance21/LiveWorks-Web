<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\AdminUnitStoreRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminUnitStoreController extends Controller
{
    public function __invoke(AdminUnitStoreRequest $request)
    {
        Unit::create($request->validated());
        return redirect()->route('admin.index')
            ->with('status', 'unit created');
    }
}
