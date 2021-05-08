<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email','mobile_no','address',
    ];
}