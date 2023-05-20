<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\GroupSession;
use App\Models\SessionAssignment;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $categories = Catalogue::all();
        $sessions = GroupSession::with('session_assignments.trainer', 'catalogues')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('courses-list', ['sessions' => $sessions,'categories' => $categories]);
    }


}
