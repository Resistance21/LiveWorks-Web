<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\AdminUnitCreateRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminUnitCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('admin.unit.create');
    }
}
