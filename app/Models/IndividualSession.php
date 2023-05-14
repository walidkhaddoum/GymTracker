<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'start_date',
        'end_date',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }

    public function sessionAssignments()
    {
        return $this->hasMany(SessionAssignment::class);
    }
}
