<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $products = Product::all();
        $byCategory = $products->groupBy('category_id');

        return view('category', ['categories' => $categories, 'products' => $products, 'byCategory' => $byCategory]);
    }
}

