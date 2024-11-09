<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $parent = Navigation::create(['name' => 'Home', 'route_name' => '#', 'icon' => null, 'order' => 1, 'group' => 'dashboard']);

        Navigation::create(['name' => 'Profile Settings', 'route_name' => 'dashboard', 'icon' => null, 'order' => 1, 'group' => 'dashboard', 'parent_id' => $parent->id]);
        Navigation::create(['name' => 'Account Settings', 'route_name' => 'student.index', 'icon' => null, 'order' => 2, 'group' => 'dashboard', 'parent_id' => $parent->id]);

        // Add more items as needed
    }
}
