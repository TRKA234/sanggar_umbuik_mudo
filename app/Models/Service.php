<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'code',
        'title',
        'description',
        'price',
        'duration_minutes',
        'location_type',
        'image',
        'is_active'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'service_id');
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, OrderItem::class, 'service_id', 'id', 'id', 'order_id');
    }
}
