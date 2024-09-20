<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role as BaseRole;

interface UserServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): User;
    public function update(User $user, array $data): bool;
    public function delete(User $user): bool;
    public function show(User $user): ?User;
    public function addRole(User $user, BaseRole | array $roles): User;
    public function removeRole(User $user, BaseRole $role): User;
}
