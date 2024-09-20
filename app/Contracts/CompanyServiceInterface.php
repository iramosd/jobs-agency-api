<?php

namespace App\Contracts;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyServiceInterface
{
    public function list(array $request = null): LengthAwarePaginator;
    public function create(array $data): Company;
    public function update(Company $company, array $data): bool;
    public function delete(Company $company): bool;
    public function show(Company $company): ?Company;

}
