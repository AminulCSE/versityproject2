<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'user_id', 'status', 'name' , 'email', 'phone', 'amount', 'address','transaction_id','currency', 'order_no', 'verify_code',
    ];
}





