<?php

namespace App\Contracts;

use App\Models\JobApplication;
use Illuminate\Pagination\LengthAwarePaginator;

interface JobApplicationServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): JobApplication;
    public function update(JobApplication $jobApplication, array $data): bool;
    public function delete(JobApplication $jobApplication): bool;
    public function show(JobApplication $jobApplication): ?JobApplication;

}
