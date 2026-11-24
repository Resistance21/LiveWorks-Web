<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends Factory<ProjectDocument>
 */
class ProjectDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = fake()->word() . '.pdf';
        $filePath = 'project-documents/' . fake()->uuid() . '/' . $fileName;

        Storage::disk('local')->put($filePath, fake()->paragraphs(3, true));

        return [
            'project_id' => Project::factory(),
            'file_path' => $filePath,
            'file_name' => $fileName,
        ];
    }
}
