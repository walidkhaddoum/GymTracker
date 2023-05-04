<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('specializations')->get();
        return view('admin.users.trainers', compact('trainers'));
    }

    public function show($id)
    {
        $trainer = Trainer::with('specializations', 'gym')->findOrFail($id);
        return response()->json($trainer);
    }
}
