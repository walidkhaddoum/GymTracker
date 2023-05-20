<?php

// app/Models/GroupSession.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupSession extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'capacity',
    ];

    public function sessionAssignments()
    {
        return $this->hasMany(SessionAssignment::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'session_assignments', 'group_session_id', 'trainer_id');
    }



    public function session_assignments()
    {
        return $this->hasMany(SessionAssignment::class, 'group_session_id');
    }

    public function registrations()
    {
        return $this->hasMany(SessionRegistration::class, 'group_session_id');
    }

    public function catalogues()
    {
        return $this->belongsToMany(Catalogue::class, 'catalogue_group_session');
    }

}

