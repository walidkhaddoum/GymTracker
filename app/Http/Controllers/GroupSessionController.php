<?php

namespace App\Http\Controllers;

use App\Models\GroupSession;
use Illuminate\Http\Request;

class GroupSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $groupSessions = GroupSession::all();
        return view('admin.sessions_management.group_sessions', compact('groupSessions'));
    }

    /**
     * Get group sessions by date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGroupSessionsByDate(Request $request, $date)
    {
        $groupSessions = GroupSession::where('date', $date)->take(6)->get();
        return response()->json($groupSessions);
    }

    // ... rest of your methods ...
}
