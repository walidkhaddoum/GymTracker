<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            ['member_id' => 1, 'gym_membership_id' => 1, 'payment_id' => 1, 'start_date' => '2023-04-01', 'end_date' => '2023-04-30'],
        ]);
    }
}
