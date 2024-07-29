<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(config('app.env') === 'local' || config('app.env') === 'staging') {
            $this->call([
                UserSeeder::class,
                ApplicantSeeder::class,
            ]);
        }
    }
}
