<?php

namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;
use Spatie\Permission\Models\Role as BaseRole;

class UserService implements UserServiceInterface
{

    public function addRole(User $user, BaseRole | array $roles): BaseRole
    {
        return $user->assignRole($roles);
    }

    public function removeRole(User $user, BaseRole $role): BaseRole
    {
        return $user->removeRole($role);
    }
}
