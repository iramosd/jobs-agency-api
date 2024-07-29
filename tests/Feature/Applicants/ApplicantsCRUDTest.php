<?php

use App\Enum\ApplicantStateEnum;
use App\Models\Applicant;
use Illuminate\Support\Facades\Hash;

it('Check for list all applicants endpoint', function () {
    $this->get('/api/v1/applicants')
        ->assertOk();
});

it('Check endpoint for create new applicant', function () {
    $password = fake()->password(8, 12);

    $this->post('/api/v1/applicants',
        [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ])->assertStatus(201);
});

it('Check endpoint for failed on create new applicant', function () {
    $this->post('/api/v1/applicants',
        [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'password' => fake()->password(5),
            'password_confirmation' => fake()->password(8, 12),
        ])->assertStatus(302);
});

it('Check endpoint for update applicant', function () {
    $this->patch('/api/v1/applicants/'.Applicant::factory()->create()->id, [
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address(),
        'city' => fake()->city(),
    ])->assertOk();
});

it('Check endpoint for show applicant', function () {

    $this->get('/api/v1/applicants/'.Applicant::factory()->create()->id)
    ->assertOk();
});

it('Check endpoint for not found applicant', function () {

    $this->get('/api/v1/applicants/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for delete applicant', function () {
    $this->delete('/api/v1/applicants/'.Applicant::factory()->create()->id)
        ->assertStatus(204);
});

it('Check endpoint for failed delete applicant', function () {
    $this->delete('/api/v1/applicants/1555151515151515151515151515')
        ->assertStatus(404);
});


