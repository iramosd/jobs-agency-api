<?php

namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;
use Spatie\Permission\Models\Role as BaseRole;

class UserService implements UserServiceInterface
{

    public function addRole(User $user, BaseRole | array $roles): User
    {
        return $user->assignRole($roles);
    }

    public function removeRole(User $user, BaseRole $role): User
    {
        return $user->removeRole($role);
    }
}
