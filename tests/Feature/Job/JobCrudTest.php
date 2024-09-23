<?php

use App\Enum\JobModalityEnum;
use App\Enum\JobTypeEnum;
use App\Models\Job;
use App\Models\Skill;
use App\Models\User;

it('check to list all jobs', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/jobs')
        ->assertOk();
});

it('check endpoint for create new job', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/jobs',
        [
            'title' => fake()->title(),
            'description' => fake()->realText(),
            'user_id' => User::factory()->create()->id,
        ])->assertStatus(201);
});

it('check endpoint for failed on create new job', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/jobs',
        [
            'title' => fake()->numberBetween(0,50),
            'description' => fake()->realText(),
        ])->assertStatus(302);
});

it('check endpoint for update job', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/jobs/' . Job::factory()->create()->id, [
        'title' => fake()->title(),
        'description' => fake()->realText(),
        'user_id' => User::factory()->create()->id,
        'modality' => JobModalityEnum::REMOTE_LOCALLY->value,
        'location' => fake()->country(),
        'type' => JobTypeEnum::CONTRACT->value,
    ])->assertOk();
});

it('check endpoint for failed on update job', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/jobs/' . Job::factory()->create()->id, [
        'title' => fake()->title(),
        'description' => fake()->realText(),
        'user_id' => User::factory()->create()->id,
        'modality' => 'anywhere',
        'location' => fake()->country(),
        'type' => 'any type',
    ])->assertStatus(302);
});

it('check endpoint for show job', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/jobs/' . Job::factory()->create()->id)
        ->assertOk();
});

it('check endpoint for not found job', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/jobs/1555151515151515151515151515')
        ->assertStatus(404);
});

it('check endpoint for delete job', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/jobs/' . Job::factory()->create()->id)
        ->assertStatus(204);
});

it('check endpoint for failed delete job', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/jobs/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for add skill to job', function () {
    $this->actingAs(User::factory()->create())->post(
        '/api/v1/jobs/'.Job::factory()->create()->id.'/skills/'.Skill::factory()->create()->id
    )->assertStatus(201);
});

it('remove skill to job', function () {
    $job = Job::factory()->create();
    $skill = Skill::factory()->create();
    $this->actingAs(User::factory()->create())->post(
        '/api/v1/jobs/'.$job->id.'/skills/'.$skill->id,
    )->assertStatus(201);

    $this->actingAs(User::factory()->create())->delete(
        '/api/v1/jobs/'.$job->id.'/skills/'.$skill->id,
    )->assertStatus(204);
});
