<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\JobServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private JobServiceInterface $service;

    public function __construct()
    {
        $this->service = new JobService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JobResource::collection($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        return new JobResource($this->service->create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return new JobResource($this->service->show($job));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $job)
    {
        $this->service->update($job, $request->validated());

        return new JobResource($job);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->service->delete($job);

        return response()->noContent();
    }
}
