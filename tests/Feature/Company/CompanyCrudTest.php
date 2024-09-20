<?php

use App\Models\Company;
use App\Models\User;

it('Check for list all company endpoint', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/companies')
        ->assertOk();
});

it('Check endpoint for create new company', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/companies',
        [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
        ])->assertStatus(201);

    $this->actingAs(User::factory()->create())->post('/api/v1/companies',
        [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
        ])->assertStatus(201);
});

it('Check endpoint for failed on create new company', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/companies',
        [
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
        ])->assertStatus(302);

    $this->actingAs(User::factory()->create())->post('/api/v1/companies',
        [
            'name' => fake()->company(),
            'address' => fake()->address(),
        ])->assertStatus(302);
});

it('Check endpoint for update company', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/companies/'.Company::factory()->create()->id, [
        'name' => fake()->company(),
        'address' => fake()->address(),
        'phone' => fake()->phoneNumber(),
    ])->assertOk();
});

it('Check endpoint for failed on update company', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/companies/'.Company::factory()->create()->id, [
        'address' => fake()->address(),
        'phone' => fake()->phoneNumber(),
    ])->assertStatus(302);
});

it('Check endpoint for show company', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/companies/'.Company::factory()->create()->id)
        ->assertOk();
});

it('Check endpoint for not found company', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/companies/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for delete company', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/companies/'.Company::factory()->create()->id)
        ->assertStatus(204);
});

it('Check endpoint for failed delete company', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/companies/1555151515151515151515151515')
        ->assertStatus(404);
});
