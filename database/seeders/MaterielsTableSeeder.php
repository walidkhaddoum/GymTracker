<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterielsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materiels')->insert([
            ['name' => 'Treadmill', 'description' => 'This is a treadmill.'],
            ['name' => 'Dumbbells', 'description' => 'These are dumbbells.'],
        ]);
    }
}
