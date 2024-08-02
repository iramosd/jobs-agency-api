<?php

use App\Models\Applicant;
use App\Models\Media;
use App\Services\MediaService;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

it('can create, show and delete media', function () {
    $fullPath = storage_path('/app/public/testing-files/test-file.pdf');

    touch($fullPath);

    $response = (new MediaService())->create(
    Applicant::factory()->create(),
    $fullPath,
    'collection_name'
    );

    $this->assertTrue($response instanceof BaseMedia);

    $media = Media::find($response->id);

    $this->assertTrue(
        (new MediaService())->show($media) instanceof Media);

    $this->assertTrue(
        (new MediaService())->delete($media)
    );
});
