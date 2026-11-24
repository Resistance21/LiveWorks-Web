<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            Project::all()->each(function ($project) {
                $documentCount = rand(1, 3);

                for ($i = 1; $i <= $documentCount; $i++) {
                    ProjectDocument::factory()->create([
                        'project_id' => $project->id,
                    ]);
                }
            });
        });
    }
}
