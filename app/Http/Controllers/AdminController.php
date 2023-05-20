<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\GroupSession;
use App\Models\GymMembership;
use App\Models\IndividualSession;
use App\Models\Materiel;
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

        $totalMembers = DB::table('users')->where('role_id', 2)->count();
        $totalTrainers = DB::table('users')->where('role_id', 3)->count();
        $totalGyms = DB::table('gyms')->count();
        $monthlyRevenue = DB::table('payments')->where('payment_status', 1)->whereRaw("DATE_FORMAT(payment_date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')")->sum('amount');

        // Get Top 5 Gyms
        $top5Gyms = DB::table('attendances')
            ->join('gyms', 'attendances.gym_space_id', '=', 'gyms.id')
            ->select('gyms.id', 'gyms.name', DB::raw('COUNT(attendances.id) AS attendance_count'))
            ->groupBy('gyms.id', 'gyms.name')
            ->orderByDesc('attendance_count')
            ->limit(5)
            ->get();

        // Get member demographics
        $memberDemographics = DB::table('members')
            ->select(DB::raw("
                                COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) < 18 THEN 1 END) AS under_18,
                                COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 18 AND 30 THEN 1 END) AS between_18_and_30,
                                COUNT(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) > 30 THEN 1 END) AS over_30
                            "))
            ->first();

        // Get new client statistics
        $newClients = DB::table('subscriptions')
            ->join('payments', 'subscriptions.payment_id', '=', 'payments.id')
            ->where('payments.payment_status', 1)
            ->select(DB::raw("DATE_FORMAT(subscriptions.created_at, '%Y-%m') AS month"), DB::raw('COUNT(*) AS new_clients'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $newClientsJson = json_encode($newClients);

        // Get latest subscriptions
        $latestSubscriptions = DB::table('subscriptions')
            ->join('members', 'subscriptions.member_id', '=', 'members.id')
            ->join('gym_memberships', 'subscriptions.gym_membership_id', '=', 'gym_memberships.id')
            ->join('payments', 'subscriptions.payment_id', '=', 'payments.id')
            ->where('payments.payment_status', 1)
            ->select('members.first_name', 'members.last_name', 'gym_memberships.name as membership_name', 'payments.amount', 'subscriptions.start_date', DB::raw('DATEDIFF(subscriptions.end_date, subscriptions.start_date) AS date_diff'), 'payments.payment_method')
            ->orderByDesc('subscriptions.start_date')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('totalMembers', 'totalTrainers', 'totalGyms', 'monthlyRevenue', 'top5Gyms', 'memberDemographics', 'newClientsJson', 'latestSubscriptions'));
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
