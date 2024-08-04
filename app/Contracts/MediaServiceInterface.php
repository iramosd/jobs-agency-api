<?php

namespace App\Contracts;

use App\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface MediaServiceInterface
{
    public function create(HasMedia $user, string | UploadedFile $file, string $collectionName): BaseMedia;
    public function delete(Media $media): ?bool;
    public function show(Media $media): Media;
}
