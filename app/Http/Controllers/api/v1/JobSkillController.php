<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\JobServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Models\Skill;
use App\Services\JobService;

class JobSkillController extends Controller
{

    private JobServiceInterface $service;

    public function __construct()
    {
        $this->service = new JobService();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Skill $skill)
    {
        $this->service->addSkill($job, $skill);

        return (new JobResource($job))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, Skill $skill)
    {
        $this->service->removeSkill($job, $skill);

        return response()->noContent();
    }
}
