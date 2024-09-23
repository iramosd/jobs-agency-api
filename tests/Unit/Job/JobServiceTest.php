<?php

use App\Enum\JobModalityEnum;
use App\Enum\JobTypeEnum;
use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Skill;
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
            'modality' => JobModalityEnum::HIBRID,
            'location' => fake()->country(),
            'type' => JobTypeEnum::TEMPORARY,
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

it('add a skill to job', function () {
    $response = (new JobService())->addSkill(Job::factory()->create(), Skill::factory()->create());

    $this->assertTrue($response);
});

it('remove a skill to job', function () {
    $job = Job::factory()->create();
    $skill = Skill::factory()->create();

    (new JobService())->addSkill($job, $skill);
    $response = (new JobService())->removeSkill($job, $skill);

    $this->assertTrue($response);
});

