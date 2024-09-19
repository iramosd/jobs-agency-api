<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as BaseRole;
class UserRoleController extends Controller
{

    private UserServiceInterface $service;

    public function __construct()
    {
        $this->service = new UserService();
    }
    public function store(User $user, BaseRole $role)
    {
        return $this->service->addRole($user, $role);
    }

    public function destroy(User $user, BaseRole $role)
    {
        return $this->service->removeRole($user, $role);
    }
}
