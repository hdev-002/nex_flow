<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $defaultApps = [
            [
                'name' => 'User Management',
                'description' => 'Manage users and roles.',
                'icon' => '<i class="ki-solid ki-shield-tick" style="font-size: 12em"></i>',
                'type' => 'default',
                'status' => 'active',
            ],
        ];

        foreach ($defaultApps as $app) {
            Application::create($app);
        }
    }
}
