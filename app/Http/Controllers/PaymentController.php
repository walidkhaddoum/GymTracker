<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['subscription.member', 'subscription.gymMembership'])
            ->get();

        return view('admin.payments_subscriptions.payments', compact('payments'));
    }
}
