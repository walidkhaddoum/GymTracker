<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public function materiels()
    {
        return $this->belongsToMany(Gym::class, 'gym_materiel');
    }
}
