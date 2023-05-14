<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function sessions()
    {
        $sessions = Auth::user()->groupSessions;
        return view('user.sessions', ['sessions' => $sessions]);
    }
}
