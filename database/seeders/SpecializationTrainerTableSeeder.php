<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTrainerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specialization_trainer')->insert([
            ['specialization_id' => 1, 'trainer_id' => 1],
            ['specialization_id' => 2, 'trainer_id' => 2],
            ['specialization_id' => 3, 'trainer_id' => 3],
            ['specialization_id' => 1, 'trainer_id' => 4],
            ['specialization_id' => 2, 'trainer_id' => 5],
            ['specialization_id' => 3, 'trainer_id' => 6],
            ['specialization_id' => 1, 'trainer_id' => 7],
            ['specialization_id' => 2, 'trainer_id' => 8],
            ['specialization_id' => 3, 'trainer_id' => 9],
            ['specialization_id' => 1, 'trainer_id' => 10],
        ]);
    }
}
