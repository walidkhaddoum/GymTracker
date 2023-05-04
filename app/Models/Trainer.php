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
}

