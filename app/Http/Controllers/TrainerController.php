<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Models\Specialization;
use App\Models\Trainer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('specializations')->get();
        $specializations = Specialization::all();
        return view('admin.users.trainers', compact('trainers', 'specializations'));
    }

    public function getTrainer(Request $request)
    {
        $specializations = \App\Models\Specialization::all();
        $trainers = Trainer::with('specializations')->get();

        if ($request->has('specialization')) {
            $trainers = $trainers->where('specializations', function ($query) use ($request) {
                $query->where('id', $request->get('specialization'));
            });
        }

        return view('trainers', ['trainers' => $trainers, 'specializations' => $specializations]);
    }

    public function show($id)
    {
        $trainer = Trainer::with('specializations', 'gym')->findOrFail($id);
        return response()->json($trainer);
    }

    public function showinformation($id)
    {
        $trainer = Trainer::with(['specializations', 'groupSessions' => function ($query) {
            $query->where('date', '>', Carbon::today()->toDateString());
        }])->findOrFail($id);

        return view('trainer-details', ['trainer' => $trainer]);
    }

    public function create()
    {
        $gyms = Gym::all();
        $specializations = Specialization::all();
        return view('admin.users.add-trainer', compact('gyms', 'specializations'));
    }

    public function store(Request $request)
    {
        // Create User First
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 2, // assuming role 2 is for trainer
        ]);

        // Save trainer picture and get the path
        $picture = $request->file('picture');
        $extension = $picture->getClientOriginalExtension();
        $newFileName = Str::random(20) . '.' . $extension;
        $picture->storeAs('public', $newFileName);

        // Create Trainer
        $trainer = Trainer::create([
            'user_id' => $user->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'picture' => $newFileName,
            'gym_id' => $request->input('gym_id'),
        ]);


        // Assign Specializations
        $trainer->specializations()->attach($request->input('specializations'));

        return redirect('/add-trainer')->with('status', 'Trainer added successfully!');
    }


}
