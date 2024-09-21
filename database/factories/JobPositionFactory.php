<?php

namespace Database\Factories;

use App\Enum\JobTypeEnum;
use App\Enum\WorkModalityEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosition>
 */
class JobPositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'description' => fake()->realText(),
            'modality' => fake()->randomElement(WorkModalityEnum::getValues()),
            'location' => fake()->country(),
            'type' => fake()->randomElement(JobTypeEnum::getValues()),
            'min_salary' => fake()->numberBetween(0, 1000),
            'max_salary' => fake()->numberBetween(1001, 2500),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
