<?php

namespace App\Contracts;

use App\Models\JobPosition;
use Illuminate\Pagination\LengthAwarePaginator;

interface JobPositionServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): JobPosition;
    public function update(JobPosition $jobPosition, array $data): bool;
    public function delete(JobPosition $jobPosition): bool;
    public function show(JobPosition $jobPosition): ?JobPosition;

}
