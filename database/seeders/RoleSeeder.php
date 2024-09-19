<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
          [
            'name' => 'admin',
            'guard_name' => 'api'
          ],
          [
                'name' => 'employer',
                'guard_name' => 'api'
          ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
