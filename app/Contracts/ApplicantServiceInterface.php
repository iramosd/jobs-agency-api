<?php

namespace App\Contracts;

use App\Enum\SkillLevelEnum;
use App\Models\Applicant;
use App\Models\ApplicantSkill;
use App\Models\Skill;
use Illuminate\Pagination\LengthAwarePaginator;

interface ApplicantServiceInterface
{

    public function list(array $request): LengthAwarePaginator;
    public function create(array $data): Applicant;
    public function update(Applicant $applicant, array $data): bool;
    public function delete(Applicant $applicant): bool;
    public function show(Applicant $applicant): ?Applicant;
    public function addSkill(Applicant $applicant, Skill $skill, ?SkillLevelEnum $level = null): ApplicantSkill;
    public function removeSkill(Applicant $applicant, Skill $skill): bool;
}
