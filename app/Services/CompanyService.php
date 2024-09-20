<?php

namespace App\Services;

use App\Contracts\CompanyServiceInterface;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService implements CompanyServiceInterface
{

    public function list(array $request = null): LengthAwarePaginator
    {
        // TODO: Implement list() method.
    }

    public function create(array $data): Company
    {
        // TODO: Implement create() method.
    }

    public function update(Company $company, array $data): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(Company $company): bool
    {
        // TODO: Implement delete() method.
    }

    public function show(Company $company): ?Company
    {
        // TODO: Implement show() method.
    }
}
