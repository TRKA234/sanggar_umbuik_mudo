<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = ['order_id', 'method', 'amount', 'bank_account', 'reference', 'receipt_path', 'status', 'admin_note'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
