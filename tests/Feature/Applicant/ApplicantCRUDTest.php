<?php

use App\Enum\ApplicantStateEnum;
use App\Models\Applicant;
use App\Models\User;

it('Check for list all applicants endpoint', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/applicants')
        ->assertOk();
});

it('Check endpoint for create new applicant', function () {
    $password = fake()->password(8, 12) . '@123Password';

    $this->actingAs(User::factory()->create())->post('/api/v1/applicants',
        [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ])->assertStatus(201);
});

it('Check endpoint for failed on create new applicant', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/applicants',
        [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'password' => fake()->password(5),
            'password_confirmation' => fake()->password(8, 12),
        ])->assertStatus(302);
});

it('Check endpoint for update applicant', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/applicants/'.Applicant::factory()->create()->id, [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->email(),
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address(),
        'city' => fake()->city(),
    ])->assertOk();
});

it('Check endpoint for failed on update applicant', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/applicants/'.Applicant::factory()->create()->id, [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address(),
    ])->assertStatus(302);
});

it('Check endpoint for show applicant', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/applicants/'.Applicant::factory()->create()->id)
    ->assertOk();
});

it('Check endpoint for not found applicant', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/applicants/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for delete applicant', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/applicants/'.Applicant::factory()->create()->id)
        ->assertStatus(204);
});

it('Check endpoint for failed delete applicant', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/applicants/1555151515151515151515151515')
        ->assertStatus(404);
});

it('add skill to applicant', function () {
    $this->actingAs(User::factory()->create())->post(
        '/api/v1/applicants/'.Applicant::factory()->create()->id.'/skills/'.Skill::factory()->create()->id,
    )->assertStatus(201);
});

it('remove skill to applicant', function () {
    $applicant = Applicant::factory()->create();
    $skill = Skill::factory()->create();
    $this->actingAs(User::factory()->create())->post(
        '/api/v1/applicants/'.$applicant->id.'/skills/'.$skill->id,
    )->assertStatus(201);

    $this->actingAs(User::factory()->create())->delete(
        '/api/v1/applicants/'.$applicant->id.'/skills/'.$skill->id,
    )->assertStatus(204);
});
