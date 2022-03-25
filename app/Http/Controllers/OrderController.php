<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request)
    {
        $basket = Basket::getBasket();
        if (!$basket->isEmpty() && $request->name && $request->phone && $request->address) {
            $order = Order::create([
                'status' => Order::ORDER_STATUS_PROCESSED,
                'basket_id' => $basket->id,
                'name' => $request->name,
                'surname' => $request->surname ?? '',
                'phone' => $request->phone,
                'email' => $request->email ?? '',
                'address' => $request->address,
                'comment' => $request->comment ?? '',
            ]);
            $result = $order->update();
            if ($result) {
                session()->flash('message', 'Заказ успешно создан!');
                session()->forget('basketId');
            }

            return redirect()->route('main');
        }
        return view('checkout');
    }
}
