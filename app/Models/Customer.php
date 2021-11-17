<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_1' ,
        'city' ,
        'post_code' ,
        'address_2' ,
        'country' ,

        'ship_name',
        'ship_email',
        'ship_phone',
        'ship_address_1' ,
        'ship_city' ,
        'ship_post_code' ,
        'ship_address_2' ,
        'ship_country' ,

    ];
}
