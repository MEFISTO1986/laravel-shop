<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Order;

class OrderController
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }
}
