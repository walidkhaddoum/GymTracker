<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndividualSession;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndividualSessionController extends Controller
{
    public function index()
    {
        $sessions = IndividualSession::with(['trainers', 'members'])->get();
        return view('admin.sessions_management.individual_sessions', compact('sessions'));
    }
}
