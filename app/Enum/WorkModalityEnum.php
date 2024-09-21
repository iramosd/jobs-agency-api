<?php

namespace App\Enum;

enum WorkModalityEnum: string
{
    case ONSITE = 'onsite';
    case HIBRID = 'hibrid';
    case REMOTE_LOCALLY = 'remote locally';
    case REMOTE_GLOBALLY = 'remote globally';
}
