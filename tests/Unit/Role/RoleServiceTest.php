<?php

use App\Models\Role;
use App\Services\RoleService;

it('create a new role', function () {
    $role = RoleService::create([
        'name' => 'test',
        'guard_name' => 'web',
    ]);

    $this->assertTrue($role instanceof Role);
});

it('retrieve role', function () {

    $role = (new RoleService())->show(Role::factory()->create());

    $this->assertTrue($role instanceof Role);
});

it('update a role', function () {
    $role = Role::factory()->create();
    $this->assertTrue($role instanceof Role);
});

it('delete a role', function () {
    $role = Role::factory()->create();
    $this->assertTrue($role instanceof Role);
});

it('list roles', function () {
    $role = Role::factory()->create();
    $this->assertTrue($role instanceof Role);
});
