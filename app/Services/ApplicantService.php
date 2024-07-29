<?php

namespace App\Services;

use App\Contracts\ApplicantServiceInterface;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Collection;

class ApplicantService implements ApplicantServiceInterface
{

    public function list(array $request = null): Collection
    {
        return Applicant::all();
    }

    public function create(array $data): Applicant
    {
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
}
