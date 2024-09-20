<?php

namespace App\Services;

use App\Contracts\CompanyServiceInterface;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService implements CompanyServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        return Company::paginate();
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data): bool
    {
       return $company->update($data);
    }

    public function delete(Company $company): bool
    {
        return $company->delete();
    }

    public function show(Company $company): ?Company
    {
        return $company;
    }
}
