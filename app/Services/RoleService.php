<?php

namespace App\Services;

use App\Contracts\RoleServiceInterface;
use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleService implements RoleServiceInterface
{

    public function list(array $request  = null): LengthAwarePaginator
    {
        return Role::paginate();
    }

    public function create(array $data): Role
    {
        return Role::create($data);
    }

    public function update(Role $role, array $data): bool
    {
        return $role->update($data);
    }

    public function delete(Role $role): bool
    {
        return Role::where('id', $role->id)->delete();
    }

    public function show(Role $role): ?Role
    {
        return $role;
    }
}
