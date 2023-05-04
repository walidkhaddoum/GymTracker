<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Subscription;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->get();
        return view('admin.users.members', compact('members'));
    }


    /*public function show(Member $member)
    {
        $subscriptions = $member->subscriptions()->orderBy('start_date', 'desc')->get();
        $subscriptionStatus = $member->getSubscriptionStatus();
        return view('admin.users.member-details', compact('member', 'subscriptions', 'subscriptionStatus'));
    }*/

    public function show(Member $member)
    {
        $subscriptions = $member->subscriptions()
            ->with(['gymMembership', 'payment']) // Include gymMembership and payment relationships
            ->orderBy('start_date', 'desc')
            ->get();
        $subscriptionStatus = $member->getSubscriptionStatus();
        $totalPaid = $subscriptions->sum(function ($subscription) {
            return $subscription->payment->amount; // Calculate the total amount paid based on the payment relationship
        });
        return view('admin.users.member-details', compact('member', 'subscriptions', 'subscriptionStatus', 'totalPaid'));
    }
}
