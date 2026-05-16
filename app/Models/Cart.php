<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
     protected $fillable = ['user_id', 'product_id', 'quantity'];

     // Each cart item belongs to one product
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'product_id');
    }
}
