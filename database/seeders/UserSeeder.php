<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alice Admin',
            'email' => 'alice@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Bob Developer',
            'email' => 'bob@example.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'Charlie Tester',
            'email' => 'charlie@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
