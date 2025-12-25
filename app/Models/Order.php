<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PaymentStatus;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status', 'payment_status'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Один заказ имеет много позиций
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    protected $casts = [
        'payment_status' => PaymentStatus::class,
    ];
}
