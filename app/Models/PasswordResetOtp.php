<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetOtp extends Model
{
    /** @use HasFactory<\Database\Factories\PasswordResetOtpFactory> */
    use HasFactory;

    protected $fillable = ['identifier', 'otp', 'verified', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];
}
