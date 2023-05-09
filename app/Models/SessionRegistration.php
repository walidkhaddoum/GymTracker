<?php
// app/Models/SessionRegistration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'individual_session_id',
    ];

    public function individualSession()
    {
        return $this->belongsTo(IndividualSession::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}


