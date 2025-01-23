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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'demo@hdev.com',
            'default_location_id' => 1,
        ]);

        $this->call([ApplicationSeeder::class]);
        $this->call([ModuleSeeder::class]);
        $this->call([NRCSeeder::class]);

    }
}
