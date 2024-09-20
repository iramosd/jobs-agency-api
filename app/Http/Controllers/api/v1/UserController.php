<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    private UserServiceInterface $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function index()
    {
        return UserResource::collection($this->service->list());
    }

    public function store(UserRequest $request)
    {
        return new UserResource($this->service->create($request->validated()));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->service->update($user, $request->validated());

        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);

        return response()->noContent();
    }

}
