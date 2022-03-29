<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    const ORDER_STATUS_NEW = 0;
    const ORDER_STATUS_PROCESSED = 1;
    const ORDER_STATUS_CLOSE = 2;

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }

    public function getUser()
    {
        $basket = $this->basket;
        $user = $basket->user;
        return $user;
    }
}
