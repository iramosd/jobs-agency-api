<?php

namespace Database\Factories;

use App\Enum\SkillLevelEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $skills = [
            'Cybersecurity',
            'Network setup',
            'Programming languages',
            'Network architecture',
            'Network security',
            'Front-end development',
            'Back-end development',
            'Cloud computing',
            'User experience design',
            'User interface design',
            'Cloud migration',
            'SQL software',
            'Operating systems',
            'Software development',
            'Data modeling',
            'Data security',
            'DevOps',
            'Mobile app development',
            'IT management',
            'Data migration',
            'Database administration',
            'Cloud management',
            'Systems Analysis',
            'Data Mining',
            'Troubleshooting',
            'Cloud architecture',
            'Project management',
            'Customer support',
            'Debugging',
            'Experience with types of hardware',
            'AutoCAD',
            'Data Science',
            'Encryption',
            'Game development',
            'Gamification',
            'Graphic design',
            'Workflow automation',
            'Customer relationship management, CRM',
            'Robotics',
            'Backup and recovery',
        ];

        return [
            'name' => fake()->unique()->randomElement($skills),
            'level' => fake()->randomElement([SkillLevelEnum::BEGINNER->value, SkillLevelEnum::INTERMEDIATE->value, SkillLevelEnum::ADVANCED->value, SkillLevelEnum::EXPERT->value]),
        ];
    }
}
