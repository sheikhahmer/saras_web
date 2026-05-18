<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductInquiryCardGenerator;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->loadMissing('category');
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(5)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }

    public function inquiryCard(Product $product, ProductInquiryCardGenerator $generator): Response
    {
        $product->loadMissing('category');
        $png = $generator->renderPng($product);

        return response($png, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
