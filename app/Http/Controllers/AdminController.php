<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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

    public function groupSessions()
    {
        return view('admin.sessions_management.group_sessions');
    }

    public function individualSessions()
    {
        return view('admin.sessions_management.individual_sessions');
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
