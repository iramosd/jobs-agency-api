<?php

use App\Models\User;
use App\Models\Role;

it('can attach single role', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    $this->actingAs(
            User::factory()->create())->post('/api/v1/users/'.$user->id.'/roles/'.$role->id,
        )->assertStatus(200);
});

it('can detach a single role', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    $this->actingAs(
        User::factory()->create())->post('/api/v1/users/'.$user->id.'/roles/'.$role->id,
    )->assertStatus(200);

    $this->actingAs(
        User::factory()->create())->delete('/api/v1/users/'.$user->id.'/roles/'.$role->id,
    )->assertStatus(204);
});
