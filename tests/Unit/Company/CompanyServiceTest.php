<?php


use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Pagination\LengthAwarePaginator;

it('create a new company', function () {
    $response = (new CompanyService())->create([
        'name' => fake()->company(),
        'address' => fake()->address(),
        'phone' => fake()->phoneNumber(),
        'email' => fake()->email(),
    ]);

    $this->assertTrue($response instanceof Company);
});

it('retrieve company', function () {

    $response = (new CompanyService())->show(Company::factory()->create());

    $this->assertTrue($response instanceof Company);
});

it('update a company', function () {
    $response = (new CompanyService())->update(
        Company::factory()->create(),
        [
            'name' => fake()->company(),
            'address' => fake()->address(),
        ]
    );

    $this->assertTrue($response);
});

it('delete a company', function () {
    $response = (new CompanyService())->delete(Company::factory()->create());

    $this->assertTrue($response);
});

it('list company', function () {
    Company::factory(15)->create();
    $response = (new CompanyService())->list();

    $this->assertTrue($response instanceof LengthAwarePaginator);
});
