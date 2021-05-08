<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Order_info extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'amount','address','transaction_id','currency','status',
    ];
}
						