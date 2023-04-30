<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMembership extends Model
{
    protected $table = 'gym_memberships';

    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration',
    ];
}

