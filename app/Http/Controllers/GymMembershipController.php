<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GymMembership;
use Illuminate\Http\Request;

class GymMembershipController extends Controller
{
    public function index()
    {
        $gym_memberships = GymMembership::all()->sortByDesc("created_at");
        return view('admin.membership_management.gym_memberships', compact('gym_memberships'));
    }

}
