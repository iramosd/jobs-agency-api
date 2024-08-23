<?php

namespace App\Contracts;

use App\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Contracts\Role as SpatieRole;
interface RoleServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): Role | SpatieRole;
    public function update(Role $role, array $data): bool;
    public function delete(Role $role): bool;
    public function show(Role $role): null| Role | SpatieRole;

}
