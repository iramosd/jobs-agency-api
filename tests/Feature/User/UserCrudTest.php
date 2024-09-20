<?php

use App\Models\User;

it('Check for list all users endpoint', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/users')
        ->assertOk();
});

it('Check endpoint for create new user', function () {
    $password = fake()->password(8, 12) . '@123Password';

    $this->actingAs(User::factory()->create())->post('/api/v1/users',
        [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => $password,
            'password_confirmation' => $password,
        ])->assertStatus(201);
});

it('Check endpoint for failed on create new user', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/users',
        [
            'name' => fake()->name(),
            'email' => 'mail12345@mail.com',
            'password' => fake()->password(5),
            'password_confirmation' => fake()->password(8, 12),
        ])->assertStatus(302);
});

it('Check endpoint for update user', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/users/'.User::factory()->create()->id, [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
    ])->assertOk();
});

it('Check endpoint for failed on update user', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/users/'.User::factory()->create()->id, [
        'name' => fake()->name(),
    ])->assertStatus(302);
});

it('Check endpoint for show user', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/users/'.User::factory()->create()->id)
        ->assertOk();
});

it('Check endpoint for not found user', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/users/1555151515151515151515151515')
        ->assertStatus(404);
});

it('Check endpoint for delete user', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/users/'.User::factory()->create()->id)
        ->assertStatus(204);
});

it('Check endpoint for failed delete user', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/users/1555151515151515151515151515')
        ->assertStatus(404);
});
