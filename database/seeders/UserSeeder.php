<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed default users.
     *
     * @return void
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('secret'),
            ]
        );
        User::updateOrCreate(
            ['email' => 'second@example.com'],
            [
                'name' => 'Second',
                'password' => Hash::make('secret'),
            ]
        );
    }
}


