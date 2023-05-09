<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'group_session_id',
        'individual_session_id',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function groupSession()
    {
        return $this->belongsTo(GroupSession::class);
    }

    public function individualSession()
    {
        return $this->belongsTo(IndividualSession::class);
    }
}
