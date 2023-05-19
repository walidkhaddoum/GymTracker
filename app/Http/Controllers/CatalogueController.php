<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('admin.gym_management.catalogues', ['catalogues' => $catalogues]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $catalogue = new Catalogue();
        $catalogue->name = $request->name;
        $catalogue->description = $request->description;
        $catalogue->save();

        return redirect()->route('admin.catalogues')->with('success', 'Catalogue added successfully.');
    }
    public function create()
    {
        return view('admin.catalogues.create');
    }

    public function edit($id)
    {
        $catalogue = Catalogue::findOrFail($id);
        return response()->json($catalogue);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add validation rules for other input fields as needed
        ]);

        $catalogue = Catalogue::findOrFail($id);
        $catalogue->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return response()->json(['message' => 'Space updated successfully']);
    }

}
