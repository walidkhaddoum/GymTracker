<?php

namespace App\Http\Controllers;

use App\Models\GroupSession;
use App\Models\SessionAssignment;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $sessions = GroupSession::with('session_assignments.trainer')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('courses-list', ['sessions' => $sessions]);
    }
}
