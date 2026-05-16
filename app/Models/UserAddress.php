<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $fillable = [
        'user_id',
        'address_type',
        'full_name',
        'flat_no',
        'street_address',
        'city',
        'state',
        'pincode',
        'phone_number',
        'alternate_phone',
        'isDefault'
    ];
}
