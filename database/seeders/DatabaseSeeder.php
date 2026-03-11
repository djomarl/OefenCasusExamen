<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Lid',
            'username' => 'lid',
            'password' => 'password',
            'role' => 'Lid',
        ]);
        User::factory()->create([
            'name' => 'Test Balie',
            'username' => 'balie',
            'password' => 'password',
            'role' => 'Balie',
        ]);
        User::factory()->create([
            'name' => 'Test Trainer',
            'username' => 'trainer',
            'password' => 'password',
            'role' => 'Trainer',
        ]);
        User::factory()->create([
            'name' => 'Test Beheerder',
            'username' => 'beheerder',
            'password' => 'password',
            'role' => 'Beheerder',
        ]);
    }
}