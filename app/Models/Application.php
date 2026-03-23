<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    protected $casts = [
        'contacts' => 'array',
        'commencement_date' => 'date',
        'registration_granted_date' => 'date',
        'uploaded_documents' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
