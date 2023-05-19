<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfUserHasMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {  // Check if the user is logged in
            $user = Auth::user();

            // Get the member associated with the user.
            $member = $user->member;

            if ($member && $member->getSubscriptionStatus() == 'active') {
                // The user has an active membership, redirect to user gyms.
                return redirect()->route('user.gyms.index');
            }
        }

        // If the user is not logged in or does not have an active membership, proceed to the requested page.
        return $next($request);
    }
}
