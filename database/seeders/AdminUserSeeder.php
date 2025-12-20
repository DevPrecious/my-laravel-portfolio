<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'oladelep77@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('oladele12'),
                'email_verified_at' => now(),
            ]
        );
    }
}
