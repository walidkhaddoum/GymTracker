<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gym extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function materiels()
    {
        return $this->belongsToMany(Materiel::class, 'gym_materiel');
    }
}

