<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'category_id',
        'price',
        'currency_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPrice()
    {
        return number_format($this->price / 100, 2, ',', ' ') . ' ' . Currency::getCurrency()->symbol;
    }

    public function getPriceNumber()
    {
        return number_format($this->price / 100, 2, '.', '');
    }
}
