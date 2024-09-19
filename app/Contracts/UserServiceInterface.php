<?php

namespace App\Contracts;

use App\Models\User;
use Spatie\Permission\Models\Role as BaseRole;

interface UserServiceInterface
{
    public function addRole(User $user, BaseRole | array $roles): BaseRole;
    public function removeRole(User $user, BaseRole $role): BaseRole;
}
