<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'phone_number',
        'email',
        'address',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }


    protected $appends = ['subscription_status'];

    public function getSubscriptionStatusAttribute()
    {
        return $this->getSubscriptionStatus();
    }
    public function getSubscriptionStatus()
    {
        $latestSubscription = $this->subscriptions()->latest()->first();

        if (!$latestSubscription) {
            return 'no_subscription';
        }

        $today = Carbon::today();
        $start_date = Carbon::parse($latestSubscription->start_date);
        $end_date = Carbon::parse($latestSubscription->end_date);


        if ($start_date->lessThanOrEqualTo($today) && $end_date->greaterThanOrEqualTo($today)) {
            return 'active';
        }

        return 'inactive';
    }

    public function favorite_trainers()
    {
        return $this->belongsToMany(Trainer::class, 'member_trainer');
    }




}

