<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User Admin',
            'email' => 'test@example.com',
            'password' => 'test',
            'role' => "admin",
        ]);

        User::factory()->create([
            'name' => 'Test User Non Admin',
            'email' => 'user@example.com',
            'password' => 'test',
            'role' => "normal",
        ]);

    }
}
