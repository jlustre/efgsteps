<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin
            [
            'name' => 'SuperAdmin',
            'username' => 'superadmin',
            'sponsor' => 'asbeesceo',
            'email' => 'admin@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'city_town' => 'Burnaby',
            'state_province' => 'BC',
            'country' => 'ca',
            'current_rank' => '3',
            'created_at' => now()
            ],

            // Admin
            [
            'name' => 'Joey Lustre',
            'username' => 'admin',
            'sponsor' => 'superadmin',
            'email' => 'jclustre@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'trainer',
            'city_town' => 'Burnaby',
            'state_province' => 'BC',
            'country' => 'ca',
            'current_rank' => '3',
            'created_at' => now()
            ],

            // Trainer
            [
            'name' => 'Trainer',
            'username' => 'trainer',
            'sponsor' => 'admin',
            'email' => 'trainer@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'trainer',
            'city_town' => 'Burnaby',
            'state_province' => 'BC',
            'country' => 'ca',
            'current_rank' => '3',
            'created_at' => now()
            ],

            // user
            [
            'name' => 'User',
            'username' => 'user',
            'sponsor' => 'trainer',
            'email' => 'user@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'city_town' => 'Burnaby',
            'state_province' => 'AB',
            'country' => 'ca',
            'current_rank' => '2',
            'created_at' => now()
            ],
            [
            'name' => 'Jerrel',
            'username' => 'jhayjhay',
            'sponsor' => 'trainer',
            'email' => 'jhayjhay@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'city_town' => 'Santa Clarita',
            'state_province' => 'CA',
            'country' => 'us',
            'current_rank' => '3',
            'created_at' => now()
            ],
            [
            'name' => 'Jenessy',
            'username' => 'jenjen',
            'sponsor' => 'jhayjhay',
            'email' => 'jenjen@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'city_town' => 'Burnaby',
            'state_province' => 'BC',
            'country' => 'ca',
            'current_rank' => '2',
            'created_at' => now()
            ],
            [
            'name' => 'Jerrick',
            'username' => 'jonjon',
            'sponsor' => 'jenjen',
            'email' => 'jonjon@efgsteps.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'city_town' => 'Burnaby',
            'state_province' => 'BC',
            'country' => 'ca',
            'current_rank' => '1',
            'created_at' => now()
            ],
        ]);
    }
}