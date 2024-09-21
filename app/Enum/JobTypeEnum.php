<?php

namespace App\Enum;

enum JobTypeEnum: string
{
    case FULL_TIME = 'full-time';
    case PART_TIME = 'part-time';
    case CONTRACT = 'contract';
    case TEMPORARY = 'temporary';
    case INTERNSHIP = 'internship';

    static function getValues(): array
    {
        return array_map(fn($type) => $type->value, JobTypeEnum::cases());
    }
}
