<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\RoleServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private RoleServiceInterface $service;

    public function __construct()
    {
        $this->service = new RoleService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        return new RoleResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RoleResource($this->service->show($role));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->service->update($role, $request->validated());

        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->service->delete($role);

        return response()->noContent();
    }
}
