<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        //$specializations = Specialization::all()->sortByDesc("created_at");
        //return view('admin.gym_management.specializations', compact('specializations'));
        return view('admin.gym_management.specializations');
    }
}
