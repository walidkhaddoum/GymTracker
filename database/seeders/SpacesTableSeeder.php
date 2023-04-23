<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spaces')->insert([
            ['name' => 'Swimming Pool'],
            ['name' => 'Boxing Room'],
            ['name' => 'Yoga Studio'],
        ]);
    }
}
