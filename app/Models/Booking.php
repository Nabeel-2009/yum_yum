<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'booking_time',
        'table_number',
        'location',
        'persons_count',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
