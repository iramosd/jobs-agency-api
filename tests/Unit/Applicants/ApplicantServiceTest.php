<?php

use App\Services\ApplicantService;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Applicant;


it('create a new applicant', function () {
    $response = (new ApplicantService())->create([
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        'email' => fake()->unique()->email(),
        'phone' => fake()->phoneNumber(),
        'address' => fake()->address(),
        'city' => fake()->city(),
        'state' => fake()->state(),
        'country' => fake()->country(),
        'status' => fake()->randomElement(['active', 'inactive']),
    ]);

    $this->assertTrue($response instanceof Applicant);
});

it('Retrieve applicant information', function () {

    $response = (new ApplicantService())->show(Applicant::factory()->create());

    $this->assertTrue($response instanceof Applicant);
});

it('Update applicant information', function () {
    $response = (new ApplicantService())->update(
        Applicant::factory()->create(),
        [
            'first_name' => fake()->firstName(),
            'phone' => fake()->phoneNumber(),
            'status' => 'active',
        ]
    );

    $this->assertTrue($response);
});

it('Delete an applicant', function () {
    $response = (new ApplicantService())->delete(Applicant::factory()->create());

    $this->assertTrue($response);
});
