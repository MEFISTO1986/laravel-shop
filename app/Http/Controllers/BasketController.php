<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $basket = Basket::getBasket();
        return view('basket', compact('basket'));
    }

    public function addProduct($productId)
    {
        $basket = Basket::getBasket();
        if ($basket->products->contains($productId)) {
            $pivotRow = $basket->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->quantity++;
            $pivotRow->update();
        } else {
            $basket->products()->attach($productId);
        }
        $basket->products->fresh();
        return redirect()->route('basket', compact('basket'));
    }

    public function removeProduct($productId)
    {
        $basket = Basket::getBasket();
        $pivotRow = $basket->products()->where('product_id', $productId)->first()->pivot;
        if ($pivotRow->quantity < 2) {
            $basket->products()->detach($productId);
        } else {
            $pivotRow->quantity--;
            $pivotRow->update();
        }

        return redirect()->route('basket', compact('basket'));
    }
}
