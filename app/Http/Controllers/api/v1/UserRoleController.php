<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
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
        return new UserResource($this->service->addRole($user, $role));
    }

    public function destroy(User $user, BaseRole $role)
    {
        $this->service->removeRole($user, $role);

        return response()->noContent();
    }
}
