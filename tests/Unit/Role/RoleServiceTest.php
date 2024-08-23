<?php

use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Pagination\LengthAwarePaginator;

it('create a new role', function () {
    $response = (new RoleService)->create([
        'name' => 'testRole',
        'guard_name' => 'web',
    ]);

    $this->assertTrue($response instanceof Role);
});

it('retrieve role', function () {

    $response = (new RoleService())->show(Role::factory()->create());

    $this->assertTrue($response instanceof Role);
});

it('update a role', function () {
    $response = (new RoleService())->update(
        Role::factory()->create(),
        [
            'name' => 'updatedNameRole',
            'guard_name' => 'web',
        ]
    );

    $this->assertTrue($response);
});

it('delete a role', function () {
    $response = (new RoleService())->delete(Role::factory()->create());

    $this->assertTrue($response);
});

it('list roles', function () {
    $response = (new RoleService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});
