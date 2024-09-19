<?php

use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Spatie\Permission\Models\Role as BaseRole;

it('can add a single role to user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    (new UserService())->addRole($user, $role);

    $this->assertTrue($user->hasAnyRole($role->name));
});

it('can add multiple roles to user', function () {
    $user = User::factory()->create();
    $role1 = Role::factory()->create();
    $role2 = Role::factory()->create();
    $role3 = Role::factory()->create();

    (new UserService())->addRole($user, [$role1, $role2, $role3]);

    $this->assertTrue($user->hasAnyRole([$role1->name, $role2->name, $role3->name]));
});

it('can remove a role to user', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();

    (new UserService())->addRole($user, $role);
    $this->assertTrue($user->hasAnyRole($role->name));

    (new UserService())->removeRole($user, $role);
    $this->assertFalse($user->hasAnyRole($role->name));
});
