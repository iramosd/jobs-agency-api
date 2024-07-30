<?php

namespace App\Contracts;

use App\Models\Applicant;
use Illuminate\Pagination\LengthAwarePaginator;

interface ApplicantServiceInterface
{

    public function list(array $request): LengthAwarePaginator;
    public function create(array $data): Applicant;
    public function update(Applicant $applicant, array $data): bool;
    public function delete(Applicant $applicant): bool;
    public function show(Applicant $applicant): ?Applicant;

}
