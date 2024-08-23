<?php

namespace App\Contracts;

use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;

interface RoleServiceInterface
{

    public function list(array $request): LengthAwarePaginator;
    public function create(array $data): Role;
    public function update(Role $role, array $data): bool;
    public function delete(Role $role): bool;
    public function show(Role $role): ?Role;

}
