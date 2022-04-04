<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Basket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'basket_product')
            ->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getCount()
    {
        if(Auth::check()) {
            $basket = Basket::getBasket();
            return $basket->products->count();
        }
        return 0;
    }

    public function isEmpty()
    {
        return $this->products->count() == 0;
    }

    public function getTotalPrice()
    {
        $price = 0;
        foreach ($this->products as $product) {
            $price += ($product->price * $product->pivot->quantity);
        }
        return $price / 100;
    }

    public function getFormattedTotalPrice()
    {
        return number_format($this->getTotalPrice(), 2, '.', ' ') . ' ' . Currency::getCurrency()->symbol;
    }

    public function getTotalPriceRow($productId)
    {
        if ($this->products->contains($productId)) {
            $product = $this->products->find($productId);
            return ($product->price * $product->pivot->quantity) / 100;
        }
        return 0;
    }

    public function getFormattedTotalPriceRow($productId)
    {
        return number_format($this->getTotalPriceRow($productId), 2, '.', ' ') . ' ' . Currency::getCurrency()->symbol;
    }

    public static function getBasket()
    {
        $basketId = session('basketId');
        $user = Auth::user();
        if (!$user) {
            return null;
        }
        if (is_null($basketId)) {
            $basket = Basket::create([
                'user_id' => $user->id,
            ]);
            session(['basketId' => $basket->id]);
        } else {
            $basket = Basket::find($basketId);
        }

        return $basket ?? null;
    }
}
