<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function gyms()
    {
        return $this->belongsToMany(Gym::class, 'gym_space');
    }
}
