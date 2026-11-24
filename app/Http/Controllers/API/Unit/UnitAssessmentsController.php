<?php

namespace App\Http\Controllers\API\Unit;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;

class UnitAssessmentsController extends Controller
{
    public function __invoke(Unit $unit): JsonResponse
    {
        return response()->json(
            Assessment::where('unit_id', $unit->id)
                ->orderByDesc('year')
                ->orderBy('name')
                ->get(['id', 'name', 'year'])
        );
    }
}
