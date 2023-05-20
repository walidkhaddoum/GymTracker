<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\GroupSession;
use App\Models\Gym;
use App\Models\GymMembership;
use App\Models\IndividualSession;
use App\Models\Materiel;
use App\Models\Member;
use App\Models\SessionAssignment;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function groupSessions()
    {
        $groupSessions = GroupSession::with('trainers.user')->get();

        return view('admin.sessions_management.group_sessions', ['groupSessions' => $groupSessions]);
    }


    public function deleteuser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.admins');
    }

    public function deletecatalogue(Catalogue $catalogue)
    {
        $catalogue->delete();
        return redirect()->route('admin.catalogues');
    }

    public function destroysession(GroupSession $groupSession)
    {
        $groupSession->delete();
        return redirect()->route('admin.group-sessions');
    }

    public function deletetrainer(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('admin.trainers');
    }

    public function destroyequipment(Materiel $materiel)
    {
        $materiel->delete();
        return redirect()->route('admin.equipments');
    }

    public function dashboard()
    {
        $totalMembers = Member::count();
        $totalTrainers = Trainer::count();
        $totalGyms = Gym::count();
        $monthlyRevenue = DB::table('payments')
            ->whereMonth('payment_date', '=', date('m'))
            ->sum('amount');

        $popularGyms = DB::table('attendances')
            ->join('gyms', 'attendances.gym_space_id', '=', 'gyms.id')
            ->select('gyms.name', DB::raw('count(*) as total_attendance'))
            ->groupBy('gyms.name')
            ->orderBy('total_attendance', 'desc')
            ->take(5)
            ->get();

        $newClientsStats = Member::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();

        // Convert the newClientsStats to the format needed by the chart
        $newClientsData = $newClientsStats->pluck('count')->toArray();
        $newClientsLabels = $newClientsStats->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('M d');
        })->toArray();


        $sessionsPerTrainer = SessionAssignment::select('trainer_id', DB::raw('count(*) as sessions'))
            ->groupBy('trainer_id')
            ->get();

        // Convert the sessionsPerTrainer to the format needed by the chart
        $sessionsPerTrainerData = $sessionsPerTrainer->pluck('sessions')->toArray();
        $sessionsPerTrainerLabels = $sessionsPerTrainer->pluck('trainer_id')->map(function ($trainerId) {
            $trainer = Trainer::find($trainerId);
            return $trainer->first_name . ' ' . $trainer->last_name;
        })->toArray();

        $latestSubscriptions = Subscription::join('members', 'subscriptions.member_id', '=', 'members.id')
            ->join('payments', 'subscriptions.payment_id', '=', 'payments.id')
            ->join('gym_memberships', 'subscriptions.gym_membership_id', '=', 'gym_memberships.id')
            ->select(
                'members.first_name',
                'members.last_name',
                'subscriptions.start_date',
                'subscriptions.end_date',
                'payments.amount',
                'payments.payment_method',
                'payments.payment_status',
                'gym_memberships.name as membership_name',
                DB::raw('DATEDIFF(subscriptions.end_date, subscriptions.start_date) as subscription_duration')
            )
            ->orderBy('subscriptions.created_at', 'desc')
            ->get();


        return view('admin.dashboard', compact('totalMembers', 'totalTrainers', 'totalGyms', 'monthlyRevenue', 'popularGyms', 'newClientsData', 'newClientsLabels', 'sessionsPerTrainerData', 'sessionsPerTrainerLabels', 'latestSubscriptions'));
    }



    public function viewProfile()
    {
        return view('admin.profile.view');
    }

    public function changePasswordView()
    {
        return view('admin.profile.change_password');
    }

    public function admins()
    {
        $admins = User::where('role_id', '1')->get();
        return view('admin.users.admins', compact('admins'));
    }


    public function members()
    {
        return view('admin.users.members');
    }

    public function trainers()
    {
        return view('admin.users.trainers');
    }

    public function gyms()
    {
        return view('admin.gym_management.gyms');
    }

    public function spaces()
    {
        return view('admin.gym_management.spaces');
    }

    public function specializations()
    {
        return view('admin.gym_management.specializations');
    }

    public function gymMembershipView($id)
    {
        $gym_membership = GymMembership::find($id);

        if ($gym_membership) {
            return view('admin.membership_management.view_gym_memberships', compact('gym_membership'));
        } else {
            return redirect()->route('admin.gym_memberships')->with('error', 'Gym membership not found');
        }
    }

    public function gymMembershipEdit($id)
    {
        $gym_membership = GymMembership::find($id);

        if ($gym_membership) {
            return view('admin.membership_management.edit_gym_memberships', compact('gym_membership'));
        } else {
            return redirect()->route('admin.gym_memberships')->with('error', 'Gym membership not found');
        }
    }

    public function subscriptions()
    {
        return view('admin.payments_subscriptions.subscriptions');
    }

    public function payments()
    {
        return view('admin.payments_subscriptions.payments');
    }


    public function individualSessions()
    {
        $previous_sessions = IndividualSession::with('sessionRegistrations.member', 'sessionAssignments.trainer')
            ->get()
            ->filter(function ($session) {
                $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $session->date . ' ' . $session->start_time);
                $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $session->date . ' ' . $session->end_time);

                return $endDateTime->lt(Carbon::now());
            });

        return view('admin.sessions_management.individual_sessions', ['previous_sessions' => $previous_sessions]);
    }

    public function attendances()
    {
        return view('admin.attandance_reports.attandance');
    }

    public function reports()
    {
        return view('admin.attandance_reports.reports');
    }

    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.users.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => 1,
        ]);

        return response()->json(['message' => 'Admin created successfully']);
    }


}
