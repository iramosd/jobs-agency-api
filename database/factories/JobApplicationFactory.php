<?php

namespace Database\Factories;

use App\Enum\ApplicationStatusEnum;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobApplication>
 */
class JobApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => Job::factory()->create()->id,
            'applicant_id' => Applicant::factory()->create()->id,
            'state' => fake()->randomElement(ApplicationStatusEnum::getValues()),
            'note' => fake()->text(),
        ];
    }
}
