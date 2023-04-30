<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GymMembership;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // This line is correct
use Carbon\Carbon;

class GymMembershipController extends Controller
{
    public function index()
    {
        $gym_memberships = GymMembership::all()->sortByDesc("created_at");
        return view('admin.membership_management.gym_memberships', compact('gym_memberships'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        GymMembership::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
        ]);

        // Redirect with a success session variable
        return redirect()->route('admin.gym_memberships')->with('data_inserted', true);
    }

    public function active_subscriptions($id)
    {
        try {
            $gym_membership = GymMembership::findOrFail($id);
            $active_subscriptions = Subscription::where('gym_membership_id', $gym_membership->id)
                ->where('start_date', '<=', Carbon::now())
                ->where('end_date', '>=', Carbon::now())
                ->whereHas('payment', function ($query) {
                    $query->where('payment_status', 1);
                })
                ->count();

            return response()->json($active_subscriptions);
        } catch (\Exception $e) {
            Log::error('Error in active_subscriptions method: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function edit($id)
    {
        $gym_membership = GymMembership::findOrFail($id);
        return response()->json($gym_membership);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_name' => 'required',
            'edit_price' => 'required|numeric|min:0',
            'edit_duration' => 'required|integer|min:1',
        ]);

        $gym_membership = GymMembership::findOrFail($id);

        $gym_membership->update([
            'name' => $request->edit_name,
            'price' => $request->edit_price,
            'duration' => $request->edit_duration,
        ]);

        return response()->json(['success' => true]);
    }


}
