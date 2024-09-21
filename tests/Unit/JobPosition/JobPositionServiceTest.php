<?php

use App\Models\JobPosition;
use App\Services\JobPositionService;

it('create a new job position', function () {
    $response = (new JobPositionService)->create([

    ]);

    $this->assertTrue($response instanceof JobPosition);
});

it('retrieve job position', function () {

    $response = (new JobPositionService())->show(JobPosition::factory()->create());

    $this->assertTrue($response instanceof JobPosition);
});

it('update a job position', function () {
    $response = (new JobPositionService())->update(
        JobPosition::factory()->create(),
        [

        ]
    );

    $this->assertTrue($response);
});

it('delete a job position', function () {
    $response = (new JobPositionService())->delete(JobPosition::factory()->create());

    $this->assertTrue($response);
});

it('list jobs positions', function () {
    $response = (new JobPositionService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});
