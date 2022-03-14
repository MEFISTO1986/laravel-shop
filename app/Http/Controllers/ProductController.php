<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(string $productId)
    {
        return view('product', ['productId' => $productId]);
    }
}
