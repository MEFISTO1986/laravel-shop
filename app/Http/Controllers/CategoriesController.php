<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories, 'category' => $categories->first()]);
    }

    public function category(string $categoryChain)
    {
        $categoriesArr = explode('/', $categoryChain);
        $categories = Category::all();
        $code = end($categoriesArr);
        $category = Category::query()
            ->where('code', $code)
            ->first();
        return view('categories', ['categories' => $categories, 'category' => $category]);
    }
}
