<?php

use App\Enum\ApplicationStatusEnum;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\JobApplication;
use App\Services\JobApplicationService;
use Illuminate\Pagination\LengthAwarePaginator;

it('create a new job application', function () {
    $response = (new JobApplicationService)->create([
        'job_id' => Job::factory()->create()->id,
        'applicant_id' => Applicant::factory()->create()->id,
        'state' => fake()->randomElement(ApplicationStatusEnum::getValues()),
        'note' => fake()->text(),
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
            'state' => fake()->randomElement(ApplicationStatusEnum::getValues()),
            'note' => fake()->text(),
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
