<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'discount_amount',
        'final_amount',	
        'payment_method',
        'payment_status',
        'order_status',
        'shipping_address',
        'tracking_id',
        'tracking_status'
    ];

     // relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}



