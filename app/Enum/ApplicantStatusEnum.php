<?php

namespace App\Enum;

enum ApplicantStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    static function getValues(): array
    {
        return array_map(fn($aplicantStatus) => $aplicantStatus->value, ApplicantStatusEnum::cases());
    }

}
