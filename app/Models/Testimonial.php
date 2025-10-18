<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
        'customer_name',
        'customer_city',
        'message',
        'rating',
        'is_public',
    ];
}
