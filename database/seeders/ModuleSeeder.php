<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            [
                'name' => 'UniStudentManagement',
                'slug' => Str::slug('UniStudentManagement'),
                'description' => 'Manages University Student Records.',
                'repository' => 'https://github.com/hdev-002/UniStudentManagement.git',
                'branch' => 'main',
                'status' => 'not-installed',
                'download_count' => 0,
                'view_count' => 0,
                'author_id' => 1, 
                'is_verified' => true,
                'visibility' => 'public',
                'license' => 'MIT',
                'last_updated_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'Next.js Boilerplate',
            //     'slug' => Str::slug('Next.js Boilerplate'),
            //     'description' => 'A starter template for Next.js projects.',
            //     'repository' => 'https://github.com/example/nextjs-boilerplate',
            //     'branch' => 'develop',
            //     'status' => 'not-installed',
            //     'download_count' => 90,
            //     'view_count' => 800,
            //     'author_id' => 2, 
            //     'is_verified' => false,
            //     'visibility' => 'private',
            //     'license' => 'GPL',
            //     'last_updated_at' => now(),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
       
    }
}
