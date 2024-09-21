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

    public function update(Job $jobPosition, array $data): bool
    {
        return $jobPosition->update($data);
    }

    public function delete(Job $jobPosition): bool
    {
        return $jobPosition->delete();
    }

    public function show(Job $jobPosition): ?Job
    {
        return $jobPosition;
    }
}
