<?php

namespace App\Services;

use App\Contracts\JobPositionServiceInterface;
use App\Models\JobPosition;
use Illuminate\Pagination\LengthAwarePaginator;

class JobPositionService implements JobPositionServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        return JobPosition::paginate();
    }

    public function create(array $data): JobPosition
    {
        return JobPosition::create($data);
    }

    public function update(JobPosition $jobPosition, array $data): bool
    {
        return $jobPosition->update($data);
    }

    public function delete(JobPosition $jobPosition): bool
    {
        return $jobPosition->delete();
    }

    public function show(JobPosition $jobPosition): ?JobPosition
    {
        return $jobPosition;
    }
}
