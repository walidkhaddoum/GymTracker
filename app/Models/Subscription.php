<?php
// app/Models/Subscription.php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'gym_membership_id',
        'start_date',
        'end_date',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gymMembership()
    {
        return $this->belongsTo(GymMembership::class);
    }

    // Add this relationship
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }


    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

}


