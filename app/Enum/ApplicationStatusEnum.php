<?php

namespace App\Enum;

enum ApplicationStatusEnum: string
{
    case IN_PROGRESS = 'in progress';
    case UNDER_CONSIDERATION = 'under consideration';
    case FOR_FUTURE_CONSIDERATION = 'for future consideration';
    case INTERVIEWING = 'interviewing';
    case INTERVIEWED = 'interviewed';
    case REJECTED = 'rejected';
    case OFFER = 'offer';
    case OFFER_ACCEPTED = 'offer accepted';
    case OFFER_DECLINED = 'offer declined';

    static function getValues(): array
    {
        return array_map(fn($status) => $status->value, ApplicationStatusEnum::cases());
    }
}
