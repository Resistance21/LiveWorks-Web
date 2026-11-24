<?php

namespace Database\Factories;

use App\Models\Assessment;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_id' => Unit::factory(),
            'year' => fake()->numberBetween(2020, 2030),
            'name' => fake()->sentence(2),
        ];
    }
}
