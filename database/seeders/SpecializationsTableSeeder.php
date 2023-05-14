<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->insert([
            ['name' => 'Personal Training'],
            ['name' => 'Yoga'],
            ['name' => 'Boxing'],
            ['name' => 'Cardio'],
            ['name' => 'Strength Training'],
            ['name' => 'Yoga'],
            ['name' => 'Kickboxing'],
            ['name' => 'Pilates'],
            ['name' => 'Crossfit'],
            ['name' => 'Aerobics'],
            ['name' => 'Martial Arts'],
            ['name' => 'Zumba'],
            ['name' => 'Weight Lifting'],
        ]);
    }
}
