<?php

namespace Database\Seeders;

use App\Models\GroupSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $groupSessionNames = ['Yoga', 'Cardio', 'HIIT', 'Pilates', 'Zumba'];

        for ($i = 0; $i < 10; $i++) {
            $startDate = now()->addDays(rand(1, 14));
            $endDate = $startDate->copy()->addHours(rand(1, 3));

            GroupSession::create([
                'name' => $groupSessionNames[array_rand($groupSessionNames)],
                'date' => $startDate->toDateString(),
                'start_time' => $startDate->toTimeString(),
                'end_time' => $endDate->toTimeString(),
                'capacity' => rand(10, 30),
            ]);
        }
    }

}
