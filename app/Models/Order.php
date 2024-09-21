<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';


    protected $fillable = [
        'ordercode',
        'customercode',
        'receivername',
        'receiverphone',
        'shipaddress',
        'note',
        'total',
        'statuscode',
        'created_at'
    ];

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'statuscode', 'statuscode');
    }
}
