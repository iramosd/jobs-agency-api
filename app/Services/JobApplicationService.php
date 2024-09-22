<?php

namespace App\Services;

use App\Contracts\JobApplicationServiceInterface;
use App\Models\JobApplication;
use Illuminate\Pagination\LengthAwarePaginator;

class JobApplicationService implements JobApplicationServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        return JobApplication::paginate();
    }

    public function create(array $data): JobApplication
    {
        return JobApplication::create($data);
    }

    public function update(JobApplication $jobApplication, array $data): bool
    {
        return $jobApplication->update($data);
    }

    public function delete(JobApplication $jobApplication): bool
    {
        return $jobApplication->delete();
    }

    public function show(JobApplication $jobApplication): ?JobApplication
    {
        return $jobApplication;
    }
}
