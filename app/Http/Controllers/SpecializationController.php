<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();
        return view('admin.gym_management.specializations', compact('specializations'));
    }

    public function create()
    {
        return view('admin.gym_management.create_specialization');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $specialization = new Specialization;
        $specialization->name = $request->name;
        $specialization->save();

        return response()->json(['success'=>'Specialization added successfully.']);
    }


    public function edit(Specialization $specialization)
    {
        return view('admin.gym_management.edit_specialization', compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $specialization->update($request->all());
        return redirect()->route('admin.specializations');
    }

    public function destroy($id)
    {
        $specialization = Specialization::find($id);

        if (!$specialization) {
            return redirect()->route('admin.specializations')->with('error', 'Specialization not found');
        }

        $specialization->delete();
        return redirect()->route('admin.specializations')->with('success', 'Specialization deleted successfully');
    }


}

