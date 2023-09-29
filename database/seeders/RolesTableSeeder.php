<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            // admin
            [
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => now()
            ],

            // Trainer
            [
            'name' => 'trainer',
            'guard_name' => 'web',
            'created_at' => now()
            ],

            // user
            [
            'name' => 'user',
            'guard_name' => 'web',
            'created_at' => now()
            ],
        ]);
    }
}