<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Subscription;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->get();

        foreach ($members as $member) {
            $latestSubscription = $member->subscriptions()->orderBy('end_date', 'desc')->first();

            if (!$latestSubscription) {
                $member->subscriptionStatus = 'none';
            } else {
                $today = Carbon::today();
                $start_date = Carbon::parse($latestSubscription->start_date);
                $end_date = Carbon::parse($latestSubscription->end_date);

                if ($start_date->lessThanOrEqualTo($today) && $end_date->greaterThanOrEqualTo($today)) {
                    $member->subscriptionStatus = 'active';
                } else {
                    $member->subscriptionStatus = 'inactive';
                }
            }
        }

        return view('admin.users.members', compact('members',));
    }




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
