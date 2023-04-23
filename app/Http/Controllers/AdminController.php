<?php

namespace App\Http\Controllers;

use App\Models\GymMembership;
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
        return view('admin.users.admins');
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
}
