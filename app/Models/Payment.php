<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_date',
        'payment_method',
        'payment_status',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function gymMembership()
    {
        return $this->belongsTo(GymMembership::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
