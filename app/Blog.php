<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image', 'title', 'user_id', 'description', 'status'
    ];
}