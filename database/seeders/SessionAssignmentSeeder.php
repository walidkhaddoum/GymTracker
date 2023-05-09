<?php

namespace Database\Seeders;

use App\Models\GroupSession;
use App\Models\SessionAssignment;
use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $trainers = Trainer::all();
        $groupSessions = GroupSession::all();

        foreach ($groupSessions as $groupSession) {
            $trainer = $trainers->random();

            SessionAssignment::create([
                'trainer_id' => $trainer->id,
                'group_session_id' => $groupSession->id,
            ]);
        }
    }

}
