<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    use HasFactory;

    public function groupSessions()
    {
        return $this->belongsToMany(GroupSession::class, 'catalogue_group_session');
    }
}
