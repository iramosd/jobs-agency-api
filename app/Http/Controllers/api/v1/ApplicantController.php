<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\ApplicantServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantRequest;
use App\Http\Resources\ApplicantResource;
use App\Models\Applicant;
use App\Services\ApplicantService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ApplicantController extends Controller
{

    private ApplicantServiceInterface $service;

    public function __construct()
    {
        $this->service = new ApplicantService();
    }
    public function index()
    {
        return ApplicantResource::collection($this->service->list());
    }

    public function show(Applicant $applicant)
    {
        return new ApplicantResource($this->service->show($applicant));
    }

    public function store(ApplicantRequest $request)
    {
        return new ApplicantResource($this->service->create($request->validated()));
    }
    public function destroy(Applicant $applicant)
    {
        $this->service->delete($applicant);

        return response()->noContent();
    }

    public function update(Applicant $applicant, ApplicantRequest $request)
    {
        $this->service->update($applicant, $request->validated());

        return new ApplicantResource($applicant);
    }
}
