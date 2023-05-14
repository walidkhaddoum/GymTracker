<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\GymMembership;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class MembershipController extends Controller
{
    public function subscribe(Request $request)
    {
        try {
            // Validate the form data
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'required',
                'date_of_birth' => 'required|date',
                'address' => 'required',
                'gym_membership_id' => 'required|exists:gym_memberships,id',
            ]);

            // Get the selected gym membership
            $gymMembership = GymMembership::find($request->gym_membership_id);

            // Start the database transaction
            DB::beginTransaction();

            // Create a new user
            $user = new User;
            $user->name = $request->first_name . $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->email); // Hash the password
            $user->role_id = 3; // Set the role_id as necessary
            $user->save();

            // Create a new member
            $member = new Member;
            $member->user_id = $user->id;
            $member->first_name = $request->first_name;
            $member->last_name = $request->last_name;
            $member->email = $request->email;
            $member->phone_number = $request->phone_number;
            $member->date_of_birth = $request->date_of_birth;
            $member->address = $request->address;
            $member->save();

            // Create a new payment
            $payment = new Payment;
            $payment->amount = $gymMembership->price;
            $payment->payment_date = now();
            $payment->payment_method = 'Credit Card';  // Update this as necessary
            $payment->payment_status = 1;  // Update this as necessary
            $payment->save();

            // Create a new subscription
            $subscription = new Subscription;
            $subscription->member_id = $member->id;
            $subscription->gym_membership_id = $gymMembership->id;
            $subscription->payment_id = $payment->id;
            $subscription->start_date = now();
            $subscription->end_date = now()->addDays($gymMembership->duration);
            $subscription->save();

            // If everything is successful, commit the transaction
            DB::commit();

            Log::info('Subscription successful for member: ' . $member->id);

            // Redirect the user back with a success message
            return redirect()->back()->with('success', 'Payment successful! Welcome to Gym Tracker.');
        } catch (\Exception $e) {
            // If something goes wrong, rollback the transaction
            DB::rollback();

            Log::error('Subscription failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }
}
