<?php

namespace App\Enum;

enum SkillLevelEnum: string
{
    case BEGINNER = 'beginner';
    case INTERMEDIATE = 'intermediate';
    case ADVANCED = 'advanced';
    case EXPERT = 'expert';

    static function getValues(): array
    {
        return array_map(fn($level) => $level->value, SkillLevelEnum::cases());
    }

}
