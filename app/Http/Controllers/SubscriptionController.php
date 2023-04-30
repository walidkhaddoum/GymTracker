<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('admin.payments_subscriptions.subscriptions');
    }

    public function subscriptions()
    {
        $subscriptions = Subscription::with(['gymMembership', 'payment', 'member']) // Add 'member' relationship
        ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.payments_subscriptions.subscriptions', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = Subscription::with(['gymMembership', 'payment', 'member']) // Add 'member' relationship
        ->findOrFail($id);

        return response()->json($subscription);
    }



}
