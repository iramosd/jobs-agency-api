<?php

use App\Models\Role;
use App\Models\User;

it('check to list all roles', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/roles')
        ->assertOk();
});

it('check endpoint for create new role', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/roles',
        [
            'name' => 'Test Role',
            'guard_name' => 'web'
        ])->assertStatus(201);
});

it('check endpoint for failed on create new role', function () {
    $this->actingAs(User::factory()->create())->post('/api/v1/roles',
        [
            'name' => 'Test Role',
            'guard_name' => 'any'
        ])->assertStatus(302);
});

it('check endpoint for update role', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/roles/' . Role::factory()->create()->id, [
        'name' => 'New Role Name',
        'guard_name' => 'api',
    ])->assertOk();
});

it('check endpoint for failed on update role', function () {
    $this->actingAs(User::factory()->create())->patch('/api/v1/roles/' . Role::factory()->create()->id, [
        'name' => null,
        'guard_name' => 'none'
    ])->assertStatus(302);
});

it('check endpoint for show role', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/roles/' . Role::factory()->create()->id)
        ->assertOk();
});

it('check endpoint for not found role', function () {
    $this->actingAs(User::factory()->create())->get('/api/v1/roles/1555151515151515151515151515')
        ->assertStatus(404);
});

it('check endpoint for delete role', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/roles/' . Role::factory()->create()->id)
        ->assertStatus(204);
});

it('check endpoint for failed delete role', function () {
    $this->actingAs(User::factory()->create())->delete('/api/v1/roles/1555151515151515151515151515')
        ->assertStatus(404);
});


