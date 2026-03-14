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
        $categories = Category::with('products')->get();
        $products = Product::all();
        $byCategory = $products->groupBy('category_id');

        return view('category', ['categories' => $categories, 'products' => $products, 'byCategory' => $byCategory]);
    }

    public function getByCategory($category)
    {
        if ($category === 'all') {
            $products = Product::with('category')->get();
            $categoryName = 'All Products';
            $categorySubtitle = 'Full Collection';
            $categoryDesc = 'Every handcrafted piece — from statement wall art to delicate plant hangers.';
        } else {
            $cat = Category::all()->firstWhere(function($c) use ($category) {
                return \Illuminate\Support\Str::slug($c->name) === $category;
            });
            if (!$cat) {
                 return response()->json(['html' => '', 'count' => 0]);
            }
            $products = Product::with('category')->where('category_id', $cat->id)->get();
            $categoryName = $cat->name;
            $categorySubtitle = 'Category';
            $categoryDesc = 'Discover our unique selection of ' . strtolower($cat->name) . ' items.';
        }

        $html = view('partials.products_grid', [
            'products' => $products,
            'categoryName' => $categoryName,
            'categorySubtitle' => $categorySubtitle,
            'categoryDesc' => $categoryDesc
        ])->render();

        return response()->json([
            'html' => $html,
            'count' => count($products),
            'heading' => $categoryName,
            'desc' => $categoryDesc
        ]);
    }
}

