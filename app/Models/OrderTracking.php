<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    //
    protected $fillable = [
        'order_id',
        'tracking_status',
        'remarks'
    ];
}
