<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndividualSession;
use App\Models\Member;
use App\Models\Reservation;
use App\Models\SessionAssignment;
use App\Models\SessionRegistration;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TrainerUsercontroller extends Controller
{
    public function index()
    {
        return view('trainer.group_sessions');
    }

    public function groupSessions()
    {
        $user = Auth::user();
        $trainer = Trainer::where('user_id', $user->id)->first();

        if ($trainer) {
            $groupSessions = $trainer->sessions()->whereNotNull('group_session_id')->orderByDesc('created_at')->get()->pluck('groupSession');
        } else {
            $groupSessions = collect();
        }

        return view('trainer.group_sessions', ['groupSessions' => $groupSessions]);
    }


    public function individualSessions()
    {
        $user = Auth::user();
        $trainer = Trainer::where('user_id', $user->id)->first();

        if ($trainer) {
            $individualSessions = $trainer->individualSessions()
                ->with('members')
                ->whereDate('date', '>=', now())
                ->orderByDesc('created_at')
                ->get();
        } else {
            $individualSessions = collect();
        }

        return view('trainer.individual_sessions', ['individualSessions' => $individualSessions]);
    }


    public function reservations()
    {
        if (Auth::check()) {
            $today = date('Y-m-d');
            $user = Auth::user();
            $trainer = Trainer::where('user_id', $user->id)->first();

            if ($trainer) {
                $reservations = Reservation::with('member')
                    ->where('trainer_id', $trainer->id)
                    ->where('session_date', '>=', $today)
                    ->get()
                    ->sortByDesc('created_at');
            } else {
                $reservations = collect();
            }

            return view('trainer.reservations', compact('reservations'));
        }
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function upcomingEvents()
    {
        $user = Auth::user();
        $trainer = Trainer::where('user_id', $user->id)->first();

        if ($trainer) {
            $groupSessions = $trainer->groupSessions()
                ->whereDate('date', '>=', Carbon::today())
                ->orderByDesc('date')
                ->get();

            $individualSessions = $trainer->individualSessions()
                ->with('members')
                ->whereDate('date', '>=', Carbon::today())
                ->orderByDesc('date')
                ->get();

            $allSessions = $groupSessions->concat($individualSessions)->sortByDesc('date');

            return view('trainer.upcoming_events', ['allSessions' => $allSessions]);
        }
    }


    public function settings()
    {
        return view('trainer.settings');
    }

    public function updateReservation(Request $request)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);
        $action = $request->action;
        $user = Auth::user();

        if ($action == 'accept') {
            $reservation->status = 1;
            $individualSession = IndividualSession::create([
                'date' => date('Y-m-d', strtotime($reservation->session_date)),
                'start_time' => $reservation->start_time,
                'end_time' => $reservation->end_time,
            ]);

            // Get the member associated with the user
            $member = Member::where('user_id', $reservation->user_id)->first();


            SessionRegistration::create([
                'member_id' => $member->id,
                'individual_session_id' => $individualSession->id,
            ]);

            SessionAssignment::create([
                'trainer_id' => $reservation->trainer_id,
                'individual_session_id' => $individualSession->id,
            ]);
        } elseif ($action == 'decline') {
            $reservation->status = -1;
        }

        $reservation->save();

        return redirect()->route('trainer.reservations');
    }


}

