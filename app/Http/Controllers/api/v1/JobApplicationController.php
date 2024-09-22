<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\JobApplicationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Http\Resources\JobApplicationResource;
use App\Models\Job;
use App\Models\JobApplication;
use App\Services\JobApplicationService;

class JobApplicationController extends Controller
{
    private JobApplicationServiceInterface $service;

    public function __construct()
    {
        $this->service = new JobApplicationService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Job $job)
    {
        return JobApplicationResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobApplicationRequest $request, Job $job)
    {
        $data = $request->validated() + [
                'job_id' => $job->id,
                'applicant_id' => auth()->user()->id,
            ];

        return new JobApplicationResource($this->service->create($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job, JobApplication $application)
    {
        return new JobApplicationResource($this->service->show($application));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobApplicationRequest $request, Job $job, JobApplication $application)
    {
        $this->service->update($application, $request->validated());

        return new JobApplicationResource($application);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, JobApplication $application)
    {
        $this->service->delete($application);

        return response()->noContent();
    }
}
