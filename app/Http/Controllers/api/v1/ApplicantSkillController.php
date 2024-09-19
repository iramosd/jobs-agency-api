<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\ApplicantServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantSkillRequest;
use App\Models\Applicant;
use App\Models\Skill;
use App\Services\ApplicantService;
use Illuminate\Http\Request;

class ApplicantSkillController extends Controller
{
    private ApplicantServiceInterface $service;
    public function __construct()
    {
        $this->service = new ApplicantService();
    }
    public function store(ApplicantSkillRequest $request, Applicant $applicant, Skill $skill)
    {
        return $this->service->addSkill($applicant, $skill);
    }

    public function destroy(Applicant $applicant, Skill $skill)
    {
        $this->service->removeSkill($applicant, $skill);

        return response()->noContent();
    }
}
