<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'picture',
        'gym_id',
    ];


    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_trainer', 'trainer_id', 'specialization_id');
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

