<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    protected $fillable = [
        'user_id',
        'otp_code',
        'expires_at',
        'verified_at',
        'attemps',
        'otp_last_sent_at'
    ];


    protected $casts = [
        'expires_at' => 'datetime',
        'verified_at' => 'datetime',
        'otp_last_sent_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
