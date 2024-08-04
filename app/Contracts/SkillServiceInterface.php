<?php

namespace App\Contracts;

use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;

interface SkillServiceInterface
{

    public function list(array $request): LengthAwarePaginator;
    public function create(array $data): Skill;
    public function update(Skill $skill, array $data): bool;
    public function delete(Skill $skill): bool;
    public function show(Skill $skill): ?Skill;

}
