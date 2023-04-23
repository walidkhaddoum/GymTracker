<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymSpaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gym_space')->insert([
            ['gym_id' => 1, 'space_id' => 1],
            ['gym_id' => 1, 'space_id' => 2],
            ['gym_id' => 2, 'space_id' => 3],
        ]);
    }
}
