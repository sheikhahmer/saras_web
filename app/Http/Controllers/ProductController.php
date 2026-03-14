<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(5)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
