<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'products' => Product::count(),
                'categories' => Category::count(),
                'sliders' => Slider::count(),
                'banners' => Banner::count(),
                'messages' => ContactMessage::count(),
                'gallery' => GalleryImage::count(),
            ],
        ]);
    }
}
