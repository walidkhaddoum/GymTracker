<?php

// app/Models/GroupSession.php

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

    public function sessionAssignments()
    {
        return $this->hasMany(SessionAssignment::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }
}

