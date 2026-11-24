<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assessment::factory()->create(
        //     [
        //         'unit_id' => 1,
        //         'year'=> 2025,
        //         'name' => 'assement 1'
        //     ]
        // );
        // Assessment::factory()->create(
        //     [
        //         'unit_id' => 1,
        //         'year'=> 2025,
        //         'name'=> 'assesment 2'
        //     ]
        // );
        // Assessment::factory()->create(
        //     [
        //         'unit_id' => 1,
        //         'year'=> 2026,
        //         'name'=> 'assesment 1'
        //     ]
        // );
        Unit::all()->each(function ($unit) {
            $years = collect(range(2020, 2030))->random(3);

            foreach ($years as $year) {
                $assessmentCount = rand(1, 3);

                for ($i = 1; $i <= $assessmentCount; $i++) {
                    Assessment::factory()->create([
                        'unit_id' => $unit->id,
                        'year' => $year,
                        'name' => "Assessment {$i}",
                    ]);
                }
            }
        });
    }
}
