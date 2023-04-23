<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainers')->insert([
            ['user_id' => 2, 'gym_id' => 1, 'first_name' => 'Fatima', 'last_name' => 'Zahra', 'email' => 'trainer@example.com', 'phone_number' => '+212600654321'],
        ]);
    }
}
