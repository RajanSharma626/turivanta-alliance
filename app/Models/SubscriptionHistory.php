<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'plan_name',
        'action',
        'admin_id',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
