<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($categoryCode, $productCode)
    {
        $product = Product::where('code', $productCode)->first();
        $cat = explode('/', $categoryCode);
        $category = Category::where('code', end($cat))->first();
        return view('product', compact('category', 'product'));
    }
}
