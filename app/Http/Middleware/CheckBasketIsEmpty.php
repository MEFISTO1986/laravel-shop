<?php

namespace App\Http\Middleware;

use App\Models\Basket;
use Closure;
use Illuminate\Http\Request;

class CheckBasketIsEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $basket = Basket::getBasket();
        if ($basket && $basket->isEmpty()) {
            session()->flash('message', 'Ваша корзина пуста!');
            return redirect()->route('main');
        }
        return $next($request);
    }
}
