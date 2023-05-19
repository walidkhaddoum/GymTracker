<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'picture',
        'gym_id',
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function groupSessions()
    {
        return $this->belongsToMany(GroupSession::class, 'session_assignments', 'trainer_id', 'group_session_id');
    }


    public function sessions()
    {
        return $this->hasMany(SessionAssignment::class);
    }



    public function individualSessions()
    {
        return $this->hasManyThrough(
            IndividualSession::class,
            SessionAssignment::class,
            'trainer_id', // Foreign key on session_assignments table...
            'id', // Foreign key on individual_sessions table...
            'id', // Local key on trainers table...
            'individual_session_id' // Local key on session_assignments table...
        );
    }

    public function favorited_by()
    {
        return $this->belongsToMany(Member::class, 'member_trainer');
    }





}

