<?php

namespace App\Contracts;

use App\Models\Job;
use Illuminate\Pagination\LengthAwarePaginator;

interface JobServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): Job;
    public function update(Job $jobPosition, array $data): bool;
    public function delete(Job $jobPosition): bool;
    public function show(Job $jobPosition): ?Job;

}
