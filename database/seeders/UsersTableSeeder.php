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
            ['name' => 'Trainer1', 'email' => 'trainer1@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer2', 'email' => 'trainer2@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer3', 'email' => 'trainer3@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer4', 'email' => 'trainer4@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer5', 'email' => 'trainer5@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer6', 'email' => 'trainer6@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer7', 'email' => 'trainer7@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer8', 'email' => 'trainer8@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer9', 'email' => 'trainer9@example.com', 'password' => Hash::make('password'), 'role_id' => 2],
            ['name' => 'Trainer10', 'email' => 'trainer10@example.com', 'password' => Hash::make('password'), 'role_id' => 2],

        ]);
    }
}
