<?php

use App\Enum\WorkModalityEnum;
use App\Models\JobPosition;
use App\Models\User;
use App\Services\JobPositionService;
use Illuminate\Pagination\LengthAwarePaginator;
/*
 * title' => fake()->title(),
        'description' => fake()->realText(),
        'modality' => fake()->,
        'location' => fake()->,
        'type' => fake()->,
        'min_salary' => fake()->,
        'max_salary' => fake()->,
        'user_id' => User::factory()->create()->id,
*/
it('create a new job position', function () {
    $response = (new JobPositionService)->create([
        'title' => fake()->title(),
        'description' => fake()->realText(),
        'user_id' => User::factory()->create()->id,
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
            'modality' => WorkModalityEnum::HIBRID,
            'location' => fake()->country(),
            'type' => \App\Enum\JobTypeEnum::TEMPORARY,
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
