<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        return view('admin.gym_management.gyms');
    }

    public function indexPublic()
    {
        $gyms = Gym::with('spaces')->get();
        $gyms = Gym::with('spaces')->get();

        return view('spaces', compact('gyms'));
    }


}
