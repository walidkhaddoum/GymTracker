<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogue extends Model
{
    use SoftDeletes;

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
