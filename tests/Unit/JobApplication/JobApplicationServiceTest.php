<?php

use App\Models\JobApplication;
use App\Models\User;
use App\Services\JobApplicationService;
use Illuminate\Pagination\LengthAwarePaginator;

it('create a new job application', function () {
    $response = (new JobApplicationService)->create([

    ]);

    $this->assertTrue($response instanceof JobApplication);
});

it('retrieve job application', function () {

    $response = (new JobApplicationService())->show(JobApplication::factory()->create());

    $this->assertTrue($response instanceof JobApplication);
});

it('update a job application', function () {
    $response = (new JobApplicationService())->update(
        JobApplication::factory()->create(),
        [

        ]
    );

    $this->assertTrue($response);
});

it('delete a job application', function () {
    $response = (new JobApplicationService())->delete(JobApplication::factory()->create());

    $this->assertTrue($response);
});

it('list jobs application', function () {
    $response = (new JobApplicationService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});
