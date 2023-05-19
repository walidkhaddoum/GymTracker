<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupSession;
use App\Models\IndividualSession;
use App\Models\SessionRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'session_date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration' => 'required|integer|min:1',
        ]);

        $reservationData = $request->all();
        $reservationData['user_id'] = Auth::user()->member->id;

        Reservation::create($reservationData);

        return response()->json([
            'success' => true,
            'message' => 'Reservation created successfully. You should wait for the trainer\'s acceptance.',
            'redirect_url' => route('user.trainers.index') // replace 'your.redirect.route' with your route
        ]);
    }




    public function reserveGroupSession(GroupSession $session)
    {
        $member_id = Auth::user()->member->id;

        $registration = new SessionRegistration();
        $registration->member_id = $member_id;
        $registration->group_session_id = $session->id;
        $registration->save();

        return redirect()->back()->with('success', 'You have successfully registered for the session. Please check your Upcoming Group Sessions for details.');
    }
}

