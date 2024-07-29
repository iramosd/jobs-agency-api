<?php

namespace App\Contracts;

use App\Models\Applicant;
use Illuminate\Database\Eloquent\Collection;

interface ApplicantServiceInterface
{

    public function list(array $request): Collection;
    public function create(array $data): Applicant;
    public function update(Applicant $applicant, array $data): bool;
    public function delete(Applicant $applicant): bool;
    public function show(Applicant $applicant): ?Applicant;

}
