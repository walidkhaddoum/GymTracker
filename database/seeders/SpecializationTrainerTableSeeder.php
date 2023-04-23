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
            ['specialization_id' => 2, 'trainer_id' => 1],
        ]);
    }
}
