<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymMembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gym_memberships')->insert([
            ['name' => 'Monthly Membership', 'price' => 500, 'duration' => 30],
            ['name' => 'Quarterly Membership', 'price' => 1350, 'duration' => 90],
        ]);
    }
}
