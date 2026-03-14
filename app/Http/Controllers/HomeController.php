<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::all();
        $banners = Banner::all();
        $newArrivals = Product::where('is_featured', Product::NEW_ARRIVAL)->take(5)->get();
        $bestSellers = Product::where('is_featured', Product::BEST_SELLER)->take(5)->get();
        $featured = Product::where('is_featured', Product::FEATURED)->take(5)->get();

        $categories = [
            'Cotton Cord',
            'Wooden Beads',
            'Wall Hanging',
            'Bags',
            'Plant Hanger',
        ];

        $bannerProducts = [];

        foreach ($categories as $name) {
            $category = Category::where('name', $name)->first();
            if ($category) {
                $product = Product::where('category_id', $category->id)->first();
                if ($product) {
                    $bannerProducts[$name] = $product;
                }
            }
        }

        return view('home', compact('newArrivals', 'bestSellers', 'featured','sliders','banners','bannerProducts'));
    }

}

