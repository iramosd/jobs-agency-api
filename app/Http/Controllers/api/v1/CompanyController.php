<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\CompanyServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private CompanyServiceInterface $service;

    public function __construct()
    {
        $this->service = new CompanyService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompanyResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        return new CompanyResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyResource($this->service->show($company));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->service->update($company, $request->validated());

        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $this->service->delete($company);

        return response()->noContent();
    }
}
