<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materiel;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Materiel::all();
        return view('admin.gym_management.equipments', ['equipments' => $equipments]);
    }


    public function create()
    {
        return view('admin.gym_management.equipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:spaces',
        ]);

        $space = new Materiel();
        $space->name = $request->name;
        $space->save();

        return redirect()->route('admin.equipments')->with('success', 'Space added successfully.');
    }

    public function edit($id)
    {
        $space = Materiel::findOrFail($id);
        return response()->json($space);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $space = Materiel::findOrFail($id);
        $space->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Space updated successfully']);
    }
}
