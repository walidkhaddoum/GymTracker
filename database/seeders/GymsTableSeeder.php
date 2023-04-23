<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gyms')->insert([
            ['name' => 'GymFit Maroc', 'address' => '15 Boulevard Al Yarmouk, Casablanca'],
            ['name' => 'StrongGym', 'address' => '23 Rue Ibn Tachfine, Rabat'],
        ]);
    }
}
