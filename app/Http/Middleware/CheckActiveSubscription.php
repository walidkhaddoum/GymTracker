<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckActiveSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Get the member associated with the user.
        $member = $user->member;

        $latestSubscription = $member->subscriptions()->orderBy('end_date', 'desc')->first();

        if (!$latestSubscription) {
            return redirect()->route('prices');
        }

        $today = Carbon::today();
        $start_date = Carbon::parse($latestSubscription->start_date);
        $end_date = Carbon::parse($latestSubscription->end_date);

        if (!($start_date->lessThanOrEqualTo($today) && $end_date->greaterThanOrEqualTo($today))) {
            return redirect()->route('prices');
        }

        return $next($request);
    }
}
