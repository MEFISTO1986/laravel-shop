<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public static function getCurrency()
    {
        $cur = env('CURRENCY_CODE', 'rub');
        return Currency::where('code' , $cur)->first();
    }
}
