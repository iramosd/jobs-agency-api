<?php

namespace App\Services;

use App\Contracts\SkillServiceInterface;
use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;

class SkillService implements SkillServiceInterface
{

    public function list(array $request): LengthAwarePaginator
    {
        return Skill::paginate();
    }

    public function create(array $data): Skill
    {
        return Skill::create($data);
    }

    public function update(Skill $skill, array $data): bool
    {
        return $skill->update($data);
    }

    public function delete(Skill $skill): bool
    {
        return $skill->delete();
    }

    public function show(Skill $skill): ?Skill
    {
        return $skill;
    }
}
