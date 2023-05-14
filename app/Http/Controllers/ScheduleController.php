<?php

namespace App\Http\Controllers;

use App\Models\GroupSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function getSchedule(Request $request)
    {
        $inputDate = $request->input('date');

        if (!$inputDate) {
            $date = now()->format('Y-m-d');
        } else {
            $dateObject = \DateTime::createFromFormat('d-m-Y', $inputDate);

            if (!$dateObject) {
                return response()->json(['error' => 'Invalid date format. Use d-m-Y format'], 400);
            }

            $date = $dateObject->format('Y-m-d');
        }

        $groupSessions = DB::table('session_assignments')
            ->join('group_sessions', 'session_assignments.group_session_id', '=', 'group_sessions.id')
            ->join('trainers', 'session_assignments.trainer_id', '=', 'trainers.id')
            ->whereDate('group_sessions.date', $date)
            ->select('group_sessions.*', 'trainers.first_name', 'trainers.last_name', 'trainers.picture')
            ->get();

        $groupSessions = $groupSessions->map(function ($groupSession) {
            $groupSession->trainer_name = $groupSession->first_name . ' ' . $groupSession->last_name;
            $groupSession->trainer_image = $groupSession->picture;
            return $groupSession;
        });

        return response()->json($groupSessions);
    }




}
