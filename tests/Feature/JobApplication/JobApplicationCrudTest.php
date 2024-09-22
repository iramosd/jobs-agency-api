<?php

use App\Enum\ApplicationStatusEnum;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\JobApplication;

it('check to list all jobs applications', function () {
    $this->actingAs(Applicant::factory()->create())->get('/api/v1/jobs/'.Job::factory()->create()->id.'/applications')
        ->assertOk();
});

it('check endpoint for create new job application', function () {
    $this->actingAs(Applicant::factory()->create())->post('/api/v1/jobs/'.Job::factory()->create()->id.'/applications',
        [
            'state' => fake()->randomElement(ApplicationStatusEnum::getValues()),
            'note' => fake()->text(),
        ])->assertStatus(201);
});

it('check endpoint for failed on create new job application', function () {
    $this->actingAs(Applicant::factory()->create())->post('/api/v1/jobs/'.Job::factory()->create()->id.'/applications',
        [
            'state' => null,
            'note' => fake()->text(),
        ])->assertStatus(302);
});

it('check endpoint for update job application', function () {
    $jobApplication = JobApplication::factory()->create();

    $this->actingAs(Applicant::factory()->create())->patch('/api/v1/jobs/'.$jobApplication->job_id.'/applications/'.$jobApplication->id, [
        'state' => fake()->randomElement(ApplicationStatusEnum::getValues()),
        'note' => fake()->text(),
    ])->assertOk();
});

it('check endpoint for failed on update job application', function () {
    $this->actingAs(Applicant::factory()->create())->patch('/api/v1/jobs/'.Job::factory()->create()->id.'/applications/'.JobApplication::factory()->create()->id, [
        'state' => null,
        'note' => null,
    ])->assertStatus(302);
});

it('check endpoint for show job application', function () {
    $this->actingAs(Applicant::factory()->create())->get('/api/v1/jobs/'.Job::factory()->create()->id.'/applications/'.JobApplication::factory()->create()->id)
        ->assertOk();
});

it('check endpoint for not found job application', function () {
    $this->actingAs(Applicant::factory()->create())->get('/api/v1/jobs/1555151515151515151515151515/applications/121212121212121212121212')
        ->assertStatus(404);
});

it('check endpoint for delete job application', function () {
    $jobApplication = JobApplication::factory()->create();

    $this->actingAs(Applicant::factory()->create())->delete('/api/v1/jobs/'.$jobApplication->job_id.'/applications/'.$jobApplication->id)
        ->assertStatus(204);
});

it('check endpoint for failed delete job application', function () {
    $this->actingAs(Applicant::factory()->create())->delete('/api/v1/jobs/1555151515151515151515151515/applications/121212121212121212121212')
        ->assertStatus(404);
});
