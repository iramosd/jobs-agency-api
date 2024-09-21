<?php

use App\Enum\WorkModalityEnum;
use App\Models\Job;
use App\Models\User;
use App\Services\JobService;
use Illuminate\Pagination\LengthAwarePaginator;

it('create a new job position', function () {
    $response = (new JobService)->create([
        'title' => fake()->title(),
        'description' => fake()->realText(),
        'user_id' => User::factory()->create()->id,
    ]);

    $this->assertTrue($response instanceof Job);
});

it('retrieve job position', function () {

    $response = (new JobService())->show(Job::factory()->create());

    $this->assertTrue($response instanceof Job);
});

it('update a job position', function () {
    $response = (new JobService())->update(
        Job::factory()->create(),
        [
            'modality' => WorkModalityEnum::HIBRID,
            'location' => fake()->country(),
            'type' => \App\Enum\JobTypeEnum::TEMPORARY,
        ]
    );

    $this->assertTrue($response);
});

it('delete a job position', function () {
    $response = (new JobService())->delete(Job::factory()->create());

    $this->assertTrue($response);
});

it('list jobs positions', function () {
    $response = (new JobService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});
