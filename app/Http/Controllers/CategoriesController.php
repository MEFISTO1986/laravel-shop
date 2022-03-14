<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list()
    {
        return view('categories');
    }

    public function category(string $categoryId)
    {
        return view('categories', ['id' => $categoryId]);
    }
}
