<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission_groups')->insert([
            [
            'name' => 'users',
            ],
            [
            'name' => 'roles',
            ],
            [
            'name' => 'permissions',
            ],
            [
            'name' => 'steps',
            ],
        ]);
    }
}