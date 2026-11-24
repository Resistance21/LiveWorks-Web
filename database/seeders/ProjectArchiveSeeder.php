<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectArchive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::transaction(function () {
            Project::all()->each(function ($project) {
                $versionCount = rand(1, 3);
    
                for ($i = 1; $i <= $versionCount; $i++) {
                    ProjectArchive::factory()->create([
                        'project_id' => $project->id,
                        'version_number' => $i,
                    ]);
                }
            });          
        });
    }
}
