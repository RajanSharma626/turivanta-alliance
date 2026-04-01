<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'is_online',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_online' => 'boolean',
    ];
}
