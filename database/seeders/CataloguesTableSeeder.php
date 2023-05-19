<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CataloguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogues')->insert([
            ['name' => 'Catalogue 1', 'description' => 'This is Catalogue 1 for group sessions.'],
            ['name' => 'Catalogue 2', 'description' => 'This is Catalogue 2 for group sessions.'],
        ]);
    }
}
