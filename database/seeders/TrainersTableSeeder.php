<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainers')->insert([
            ['user_id' => 2, 'gym_id' => 1, 'first_name' => 'Fatima', 'last_name' => 'Zahra', 'email' => 'trainer@example.com', 'phone_number' => '+212600654321', 'picture' => 'filephoto.jpg'],
            ['user_id' => 3, 'gym_id' => 1, 'first_name' => 'Mohamed', 'last_name' => 'Bouazizi', 'email' => 'mohamed@example.com', 'phone_number' => '+212600654322', 'picture' => 'filephoto.jpg'],
            ['user_id' => 4, 'gym_id' => 1, 'first_name' => 'Yasmina', 'last_name' => 'El Kadi', 'email' => 'yasmina@example.com', 'phone_number' => '+212600654323', 'picture' => 'filephoto.jpg'],
            ['user_id' => 5, 'gym_id' => 1, 'first_name' => 'Karim', 'last_name' => 'Boukhari', 'email' => 'karim@example.com', 'phone_number' => '+212600654324', 'picture' => 'filephoto.jpg'],
            ['user_id' => 6, 'gym_id' => 1, 'first_name' => 'Latifa', 'last_name' => 'Bennis', 'email' => 'latifa@example.com', 'phone_number' => '+212600654325', 'picture' => 'filephoto.jpg'],
            ['user_id' => 7, 'gym_id' => 1, 'first_name' => 'Ahmed', 'last_name' => 'Ouaziz', 'email' => 'ahmed@example.com', 'phone_number' => '+212600654326', 'picture' => 'filephoto.jpg'],
            ['user_id' => 8, 'gym_id' => 1, 'first_name' => 'Najat', 'last_name' => 'Belkacem', 'email' => 'najat@example.com', 'phone_number' => '+212600654327', 'picture' => 'filephoto.jpg'],
            ['user_id' => 9, 'gym_id' => 1, 'first_name' => 'Omar', 'last_name' => 'Benali', 'email' => 'omar@example.com', 'phone_number' => '+212600654328', 'picture' => 'filephoto.jpg'],
            ['user_id' => 10, 'gym_id' => 1, 'first_name' => 'Zohra', 'last_name' => 'El Fassi', 'email' => 'zohra@example.com', 'phone_number' => '+212600654329', 'picture' => 'filephoto.jpg'],
            ['user_id' => 11, 'gym_id' => 1, 'first_name' => 'Abdel', 'last_name' => 'El Krim', 'email' => 'abdel@example.com', 'phone_number' => '+212600654330', 'picture' => 'filephoto.jpg'],

        ]);
    }
}
