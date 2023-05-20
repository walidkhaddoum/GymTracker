<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GymMembership extends Model
{
    protected $table = 'gym_memberships';

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'duration',
    ];
}

