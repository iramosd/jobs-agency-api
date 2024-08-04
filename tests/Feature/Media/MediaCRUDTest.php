<?php

use App\Models\Applicant;

//TODO Need improve testing to pass collection files
it('Check endpoint for add a cv to applicant', function(){
    $fullPath = storage_path('/app/public/testing-files/test-file.pdf');
    touch($fullPath);

    $this->actingAs(Applicant::factory()->create())->post('/api/v1/media',
        [
            'media' => $fullPath,
            'collection_name' => 'cv'
        ])->assertStatus(201);
});
