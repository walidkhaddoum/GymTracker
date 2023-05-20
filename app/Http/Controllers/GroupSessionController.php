<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\GroupSession;
use App\Models\Trainer;
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
        $trainers = Trainer::all();
        $catalogues = Catalogue::all();

        return view('admin.sessions_management.group_sessions', compact('groupSessions', 'trainers', 'catalogues'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category_id' => 'required|exists:catalogues,id',
            'capacity' => 'required|integer',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $groupSession = GroupSession::create([
            'name' => $request->name,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'capacity' => $request->capacity,
        ]);

        $groupSession->trainers()->attach($request->trainer_id);
        $groupSession->catalogues()->attach($request->category_id);

        return redirect()->back()->with('success', 'Group session created successfully');
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
