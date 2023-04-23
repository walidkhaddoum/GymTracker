<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendances')->insert([
            [
                'member_id' => 1,
                'gym_space_id' => 1,
                'date' => '2023-04-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 1,
                'gym_space_id' => 2,
                'date' => '2023-04-02',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
