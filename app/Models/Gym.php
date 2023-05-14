<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    public function trainers()
    {
        return $this->hasMany(Trainer::class);
    }

    public function spaces()
    {
        return $this->belongsToMany(Space::class, 'gym_space');
    }
}

