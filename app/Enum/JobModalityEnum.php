<?php

namespace App\Enum;

enum JobModalityEnum: string
{
    case ONSITE = 'onsite';
    case HIBRID = 'hibrid';
    case REMOTE_LOCALLY = 'remote locally';
    case REMOTE_GLOBALLY = 'remote globally';

    static function getValues(): array
    {
        return array_map(fn($modality) => $modality->value, JobModalityEnum::cases());
    }

}
