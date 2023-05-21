<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\Materiel;
use App\Models\Space;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        return view('admin.gym_management.gyms', ['gyms' => $gyms]);
    }

    public function create()
    {
        $spaces = Space::all();
        $materiels = Materiel::all();
        return view('admin.gym_management.create', ['spaces' => $spaces, 'materiels' => $materiels]);
    }

    public function store(Request $request)
    {
        $gym = Gym::create($request->only(['name', 'address']));

        if($request->has('spaces')){
            $gym->spaces()->sync($request->spaces);
        }

        if($request->has('materiels')){
            foreach($request->materiels as $materiel){
                $gym->materiels()->attach($materiel, ['quantity' => $request->quantity[$materiel]]);
            }
        }

        return redirect()->route('admin.gyms.index');
    }

    public function destroy($id)
    {
        $gym = Gym::find($id);
        $gym->delete();

        return redirect()->route('admin.gyms.index');
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
