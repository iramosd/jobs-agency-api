<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ismael Ramos',
                'email' => 'iramosdev@hotmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Jobs2025!'),
                'remember_token' => Str::random(10),
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }

        if(config('app.env') === 'local' || config('app.env') === 'testing') {
            User::factory(40)->create();
        }
    }
}
