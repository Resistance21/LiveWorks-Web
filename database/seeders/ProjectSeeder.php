<?php

namespace Database\Seeders;

use App\Models\Assessment;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assessment::all()->each(function ($assessment) {
            $projectCount = rand(1, 3);

            for ($i = 1; $i <= $projectCount; $i++) {
                Project::factory()->create([
                    'assessment_id' => $assessment->id,
                ]);
            }
        });
    }
}
