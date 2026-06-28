<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user1',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456789'),
            'point' => 10000,
            'role' => 'user',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'point' => 10000,
            'role' => 'admin',
        ]);
    }
}