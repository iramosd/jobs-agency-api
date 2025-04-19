<?php

namespace Database\Factories;

use App\Enum\SkillLevelEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicantSkill>
 */
class ApplicantSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'applicant_id' => fake()->randomElement(range(1,50)),
            'skill_id' => fake()->randomElement(range(1,40)),
            'level' => fake()->randomElement(SkillLevelEnum::getValues()),
        ];
    }
}
