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
            'user_id' => 'required|exists:users,id',
            'trainer_id' => 'required|exists:trainers,id',
            'session_date' => 'required|date|after:today',
        ]);

        Reservation::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Reservation created successfully.',
        ]);
    }


    public function reserveGroupSession(GroupSession $session)
    {
        $member_id = Auth::id();

        $registration = new SessionRegistration();
        $registration->member_id = $member_id;
        $registration->group_session_id = $session->id;
        $registration->save();

        return redirect()->back()->with('success', 'You have successfully registered for the session. Please check your Upcoming Group Sessions for details.');
    }
}

