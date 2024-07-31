<?php

namespace App\Services;

use App\Contracts\ApplicantServiceInterface;
use App\Enum\SkillLevelEnum;
use App\Models\Applicant;
use App\Models\ApplicantSkill;
use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class ApplicantService implements ApplicantServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        return Applicant::paginate();
    }

    public function create(array $data): Applicant
    {
        $data['password'] = Hash::make($data['password']);

        return Applicant::create($data);
    }

    public function update(Applicant $applicant, array $data): bool
    {
        return $applicant->update($data);
    }

    public function delete(Applicant $applicant): bool
    {
        return $applicant->delete();
    }

    public function show(Applicant $applicant): Applicant
    {
        return $applicant;
    }

    public function addSkill(Applicant $applicant, Skill $skill, ?SkillLevelEnum $level = null): ApplicantSkill
    {
        return ApplicantSkill::updateOrCreate([
            'applicant_id' => $applicant->id,
            'skill_id' => $skill->id
        ], [
            'level' => $level,
        ]);
    }

    public function removeSkill(Applicant $applicant, Skill $skill): bool
    {
        return $applicant->skills()->detach($skill);
    }
}
