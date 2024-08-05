<?php

use App\Models\Applicant;
use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

it('can create, show and delete media', function () {

    Storage::fake('testing');

    $response = (new MediaService())->create(
    Applicant::factory()->create(),
    UploadedFile::fake()->create('test-cv.pdf', 2048, 'application/pdf'),
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
