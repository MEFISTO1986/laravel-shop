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

    public function category(string $categoryCode)
    {
        $categories = Category::all();
        $category = Category::query()
            ->where('code', $categoryCode)
            ->first();
        return view('categories', ['categories' => $categories, 'category' => $category]);
    }
}
