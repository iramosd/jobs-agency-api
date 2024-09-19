<?php

use App\Models\Applicant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

//TODO Need improve testing to pass files for cv media collection
it('Check endpoint for add / delete a cv to applicant', function(){

    $applicant = Applicant::factory()->create();
    Storage::fake('testing');

    $this->actingAs($applicant)->post('/api/v1/media',
        [
            'media' =>  UploadedFile::fake()->create('test-cv.pdf', 2048, 'application/pdf'),
            'collection_name' => 'collection_name',
        ])->assertStatus(201);

    $media = $applicant->getMedia('collection_name')->first();
    $this->actingAs($applicant)->delete('/api/v1/media/'.$media->id,
        )->assertStatus(204);
});
