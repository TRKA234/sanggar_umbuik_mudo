<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat di-serialize
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // otomatis hash password di Laravel 10+
    ];

    /**
     * Default attribute
     */
    protected $attributes = [
        'role' => 'user',
    ];
}
