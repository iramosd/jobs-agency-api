<?php

namespace App\Models;

use App\Enum\SkillLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantSkill extends Model
{
    use HasFactory;

    protected $table = 'applicant_skills';

    protected $fillable = [
        'applicant_id',
        'skill_id',
        'level',
    ];

    protected $casts = [
        'level' => SkillLevelEnum::class,
    ];
}
