<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'capacity',
    ];

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }

    public function sessionAssignments()
    {
        return $this->hasMany(SessionAssignment::class);
    }

    public function getGroupSessionsByDate(Request $request, $date)
    {
        $group_sessions = GroupSession::where('date', $date)->take(6)->get();
        return response()->json($group_sessions);
    }


}

