<?php

namespace App\Contracts;

use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;

interface JobServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): Job;
    public function update(Job $job, array $data): bool;
    public function delete(Job $job): bool;
    public function show(Job $job): ?Job;
    public function addSkill(Job $job, Skill $skill): bool;
    public function removeSkill(Job $job, Skill $skill): bool;

}
