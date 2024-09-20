<?php

use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

it('create a new user', function () {
    $response = (new UserService())->create([
        'name' => 'Test User',
        'email' => 'testing@mail.com',
        'password' => Hash::make('password'),
       ]);

    $this->assertTrue($response instanceof User);
});

it('retrieve user', function () {

    $response = (new UserService())->show(User::factory()->create());

    $this->assertTrue($response instanceof User);
});

it('update a user', function () {
    $response = (new UserService())->update(
        User::factory()->create(),
        [
            'name' => 'Test name updated',
            'email' => 'newmail@mail.com',
            'password' => Hash::make('password'),
        ]
    );

    $this->assertTrue($response);
});

it('delete a user', function () {
    $response = (new UserService())->delete(User::factory()->create());

    $this->assertTrue($response);
});

it('list users', function () {
    $response = (new UserService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});

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
