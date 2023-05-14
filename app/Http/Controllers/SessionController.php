<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function checkLoginAndRedirect(GroupSession $session)
    {
        if(Auth::check()) {
            // User is logged in, redirect them to their group sessions
            return redirect()->route('user.group-sessions.browse');
        } else {
            // User is not logged in, redirect them to the prices page
            return redirect()->route('prices');
        }
    }
}
