<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckMembership
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'member') {

            $latestSubscription = Auth::user()->subscriptions()->latest()->first();

            if (!$latestSubscription) {
                return redirect()->route('prices');
            }

            $today = Carbon::today();
            $start_date = Carbon::parse($latestSubscription->start_date);
            $end_date = Carbon::parse($latestSubscription->end_date);

            if (!$start_date->lessThanOrEqualTo($today) || !$end_date->greaterThanOrEqualTo($today)) {
                return redirect()->route('prices');
            }
        }

        return $next($request);
    }
}
