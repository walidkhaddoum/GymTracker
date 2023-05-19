<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Space;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        return view('admin.gym_management.gyms');
    }

    public function indexPublic(Request $request)
    {
        $spaceId = $request->get('space_id');

        $gyms = Gym::with('spaces');

        if ($spaceId) {
            $gyms->whereHas('spaces', function ($query) use ($spaceId) {
                $query->where('spaces.id', $spaceId);
            });
        }

        $gyms = $gyms->get();

        $spaces = Space::all();

        return view('spaces', compact('gyms', 'spaces'));
    }



}
