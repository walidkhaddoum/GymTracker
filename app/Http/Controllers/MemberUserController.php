<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GroupSession;
use App\Models\Gym;
use App\Models\IndividualSession;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberUserController extends Controller
{
    public function gymsIndex()
    {
        $gyms = Gym::with('spaces')->get();

        return view('user.gyms.index', compact('gyms'));
    }

    public function browseGroupSessions()
    {
        $user_id = Auth::user()->member->id;

        if (Auth::check()) {
        $today = Carbon::today()->toDateString();

        $group_sessions = GroupSession::with(['sessionAssignments.trainer', 'sessionRegistrations' => function ($query) use ($user_id) {
            $query->where('member_id', $user_id);
        }])
            ->where('date', '>=', $today)
            ->orderBy('date','desc')
            ->get();

        return view('user.group-sessions.browse', ['group_sessions' => $group_sessions]);
        } else {
            return redirect()->route('prices');
        }
    }

    public function upcomingGroupSessions()
    {
        $user_id = Auth::user()->member->id;

        $upcoming_sessions = GroupSession::whereHas('sessionRegistrations', function ($query) use ($user_id) {
            $query->where('member_id', $user_id);
        })
            ->with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->whereDate('date', '>=', Carbon::today())
            ->get();

        return view('user.group-sessions.upcoming', ['upcoming_sessions' => $upcoming_sessions]);
    }

    public function reserveGroupSession($id)
    {
        return view('user.group-sessions.reserve');
    }

    public function personalTrainingIndex()
    {
        return view('user.personal-training.index');
    }

    public function trainersIndex()
    {
        $trainers = Trainer::all();
        return view('user.trainers.index', compact('trainers'));
    }

    public function reserveTrainer($id)
    {
        // Implement reservation logic here

        return view('user.trainers.reserve');
    }

    public function upcomingReservations()
    {
        $user_id = Auth::user()->member->id;

        $upcoming_individual_sessions = IndividualSession::whereHas('sessionRegistrations', function ($query) use ($user_id) {
            $query->where('member_id', $user_id);
        })
            ->with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->whereDate('date', '>=', Carbon::today())
            ->get();

        $upcoming_group_sessions = GroupSession::whereHas('sessionRegistrations', function ($query) use ($user_id) {
            $query->where('member_id', $user_id);
        })
            ->with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->whereDate('date', '>=', Carbon::today())
            ->get();

        return view('user.reservations.upcoming', [
            'upcoming_individual_sessions' => $upcoming_individual_sessions,
            'upcoming_group_sessions' => $upcoming_group_sessions,
        ]);
    }
    public function previousPersonalTrainingSessions()
    {
        $member_id = Auth::user()->member->id;

        $previous_sessions = IndividualSession::whereHas('sessionRegistrations', function ($query) use ($member_id) {
            $query->where('member_id', $member_id);
        })
            ->with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->get()
            ->filter(function ($session) {
                $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $session->date . ' ' . $session->start_time);
                $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $session->date . ' ' . $session->end_time);

                return $endDateTime->lt(Carbon::now());
            });

        return view('user.personal-training.previous', ['previous_sessions' => $previous_sessions]);
    }

    public function upcomingPersonalTrainingSessions()
    {
        $member_id = Auth::user()->member->id;

        $upcoming_sessions = IndividualSession::whereHas('sessionRegistrations', function ($query) use ($member_id) {
            $query->where('member_id', $member_id);
        })
            ->with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->get()
            ->filter(function ($session) {
                $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $session->date . ' ' . $session->start_time);
                return $startDateTime->gt(Carbon::now());
            });

        return view('user.personal-training.upcoming', ['upcoming_sessions' => $upcoming_sessions]);
    }

    public function subscriptionIndex()
    {
        return view('user.subscription.index');
    }

    public function subscriptionDetails()
    {
        return view('user.subscription.details');
    }

    public function subscriptionHistory()
    {
        $user = User::with('subscriptions')->find(Auth::id());
        return view('user.subscription.history', ['user' => $user]);
    }

    public function changeSubscription()
    {
        // Implement subscription change logic here

        return view('user.subscription.change');
    }

    public function reservationsIndex()
    {
        return view('user.reservations.index');
    }

    public function pastReservations()
    {
        return view('user.reservations.past');
    }

}
