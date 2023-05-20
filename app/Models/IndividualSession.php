<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndividualSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'trainer_id',
        'date',
        'start_time',
        'end_time',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function members()
    {
        return $this->belongsToMany(
            Member::class,
            'session_registrations',
            'individual_session_id',
            'member_id'
        );
    }


    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }

    public function sessionAssignments()
    {
        return $this->hasMany(SessionAssignment::class, 'individual_session_id');
    }
}
