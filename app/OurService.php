<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
	protected $fillable = [
        'title', 'description', 'image', 'status'
    ];
}



