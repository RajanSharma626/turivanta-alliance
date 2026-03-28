<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['membership_id', 'first_name', 'last_name', 'name', 'email', 'password', 'gender', 'dob', 'contact_no', 'business_type', 'avatar', 'otp', 'otp_expires_at', 'current_step', 'country_concerned', 'legal_status'])]
#[Hidden(['password', 'remember_token', 'otp'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->membership_id = self::generateUniqueMembershipId();
        });
    }

    protected static function generateUniqueMembershipId()
    {
        do {
            $id = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        } while (self::where('membership_id', $id)->exists());

        return $id;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'otp_expires_at' => 'datetime',
        ];

    }

    public function application()
    {
        return $this->hasOne(\App\Models\Application::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function currentSubscription()
    {
        return $this->hasOne(\App\Models\Subscription::class)->where('status', 'active')->latest('starts_at');
    }

    public function subscriptionHistories()
    {
        return $this->hasMany(\App\Models\SubscriptionHistory::class);
    }
}
