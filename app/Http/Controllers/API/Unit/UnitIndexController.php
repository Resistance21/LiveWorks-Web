<?php

namespace App\Http\Controllers\API\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;

class UnitIndexController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            Unit::orderBy('unit_code')->get(['id', 'unit_code', 'unit_name'])
        );
    }
}
