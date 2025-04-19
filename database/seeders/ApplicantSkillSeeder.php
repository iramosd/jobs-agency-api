<?php

namespace Database\Seeders;

use App\Models\ApplicantSkill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicantSkill::factory(180)->create();
    }
}
