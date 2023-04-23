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
            ['name' => 'admin_123', 'email' => 'admin@example.com', 'password' => Hash::make('password123'), 'role_id' => 1],
            ['name' => 'trainer_123', 'email' => 'trainer@example.com', 'password' => Hash::make('password123'), 'role_id' => 2],
            ['name' => 'member_123', 'email' => 'member@example.com', 'password' => Hash::make('password123'), 'role_id' => 3],
        ]);
    }
}
