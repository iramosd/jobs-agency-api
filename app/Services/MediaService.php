<?php

namespace App\Services;

use App\Contracts\MediaServiceInterface;
use App\Contracts\Skill;
use App\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediaService implements MediaServiceInterface
{

    public function create(HasMedia $user, string | UploadedFile $file, string $collectionName): BaseMedia
    {
        return $user->addMedia($file)->toMediaCollection($collectionName);
    }

    public function delete(Media $media): ?bool
    {
       return $media->delete();
    }
}
