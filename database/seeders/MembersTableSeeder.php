<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            ['user_id' => 3, 'first_name' => 'Youssef', 'last_name' => 'El Amrani', 'date_of_birth' => '1990-05-10', 'phone_number' => '+212600123456', 'email' => 'member@example.com', 'address' => '100 Rue Oued Zem, Casablanca'],
        ]);
    }
}
