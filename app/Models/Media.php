<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;


class Media extends BaseMedia
{
    use HasFactory;

    protected $appends = ['url'];

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFullUrl(),
        );
    }
}
