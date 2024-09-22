<?php

namespace App\Services;

use App\Contracts\JobServiceInterface;
use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;

class JobService implements JobServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        return Job::paginate();
    }

    public function create(array $data): Job
    {
        return Job::create($data);
    }

    public function update(Job $job, array $data): bool
    {
        return $job->update($data);
    }

    public function delete(Job $job): bool
    {
        return $job->delete();
    }

    public function show(Job $job): ?Job
    {
        return $job;
    }
}
