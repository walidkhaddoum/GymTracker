<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index()
    {
        $spaces = Space::orderBy('created_at', 'desc')->get();
        return view('admin.gym_management.spaces', compact('spaces'));
    }

    public function create()
    {
        return view('admin.spaces.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:spaces',
            'capacity' => 'required|integer|min:1',
        ]);

        $space = new Space();
        $space->name = $request->name;
        $space->capacity = $request->capacity;
        $space->save();

        return redirect()->route('admin.spaces.index')->with('success', 'Space added successfully.');
    }

    public function edit($id)
    {
        $space = Space::findOrFail($id);
        return response()->json($space);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $space = Space::findOrFail($id);
        $space->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // Add other input fields to be updated as needed
        ]);

        return response()->json(['message' => 'Space updated successfully']);
    }



}
