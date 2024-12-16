<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'name' => 'UniStudentManagement',
                'description' => 'Manages University Student Records.',
                'repository' => 'https://github.com/hdev-002/UniStudentManagement.git',
                'status' => 'not-installed',
            ],
//            [
//                'name' => 'Purchase',
//                'description' => 'Handles purchases.',
//                'repository' => 'https://github.com/yourorg/purchase-module.git',
//                'status' => 'not-installed',
//            ],
//            [
//                'name' => 'Sale',
//                'description' => 'Manages sales.',
//                'repository' => 'https://github.com/yourorg/sale-module.git',
//                'status' => 'not-installed',
//            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
