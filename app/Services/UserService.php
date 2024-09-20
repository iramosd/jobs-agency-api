<?php

namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\Permission\Models\Role as BaseRole;

class UserService implements UserServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator
    {
        return User::paginate();
    }
    public function create(array $data): User
    {
        return User::create($data);
    }
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }
    public function delete(User $user): bool
    {
        return $user->delete();
    }
    public function show(User $user): ?User
    {
        return $user;
    }

    public function addRole(User $user, BaseRole | array $roles): User
    {
        return $user->assignRole($roles);
    }

    public function removeRole(User $user, BaseRole $role): User
    {
        return $user->removeRole($role);
    }
}
