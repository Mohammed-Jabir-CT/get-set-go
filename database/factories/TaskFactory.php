<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'project_id' => Project::inRandomOrder()->first()->id,
            'created_by' => fake()->numberBetween(1,2),
            'assigned_to' => fake()->numberBetween(3,4),
            'status' => $this->faker->randomElement(['initiated', 'ongoing', 'completed']),
        ];
    }
}
