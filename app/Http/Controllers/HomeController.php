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

        $newArrivals = [
            [
                'name'          => 'Wall Hanging',
                'price'         => 230.00,
                'old_price'     => null,
                'badge'         => 'Hot',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Macrame Basket',
                'price'         => 185.00,
                'old_price'     => null,
                'badge'         => 'New',
                'badge_color'   => 'bg-charcoal',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Plant Hanger',
                'price'         => 320.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => null,
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Cotton Cord',
                'price'         => 145.00,
                'old_price'     => 195.00,
                'badge'         => 'Sale',
                'badge_color'   => 'bg-sand',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Boho Wall Art',
                'price'         => 98.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => null,
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
        ];

        $bestSellers = [
            [
                'name'          => 'Knotted Runner',
                'price'         => 890.00,
                'old_price'     => null,
                'badge'         => 'Hot',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Tassel Garland',
                'price'         => 540.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => null,
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Dream Catcher',
                'price'         => 210.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => null,
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Boho Mirror',
                'price'         => 680.00,
                'old_price'     => null,
                'badge'         => 'Top',
                'badge_color'   => 'bg-charcoal',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Macrame Cushion',
                'price'         => 88.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => null,
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
        ];

        $itemsSale = [
            [
                'name'          => 'Woven Tapestry',
                'price'         => 630.00,
                'old_price'     => 900.00,
                'badge'         => '-30%',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Cord Bundle',
                'price'         => 110.00,
                'old_price'     => 155.00,
                'badge'         => 'Sale',
                'badge_color'   => 'bg-sand',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Knot Kit',
                'price'         => 95.00,
                'old_price'     => 190.00,
                'badge'         => '-50%',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Planter Hanger',
                'price'         => 28.00,
                'old_price'     => 45.00,
                'badge'         => 'Sale',
                'badge_color'   => 'bg-sand',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Woven Shelf',
                'price'         => 360.00,
                'old_price'     => 450.00,
                'badge'         => '-20%',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img5.webp'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
        ];

        return view('home', compact('newArrivals', 'bestSellers', 'itemsSale','sliders','banners','bannerProducts'));
    }
    public function detail()
    {
        $product = [
            'name'          => 'Woven Tapestry',
            'price'         => 630.00,
            'old_price'     => 900.00,
            'badge'         => '-30%',
            'badge_color'   => 'bg-rouge',
            'img_primary'   => asset('img/banner-img5.webp'),
            'img_secondary' => asset('img/banner-img1.webp'),
            'slug'          => 'woven-tapestry',
            'sku'           => 'SC-WT-001',
            'category'      => 'Wall Hangings',
            'stars'         => 5,
            'avg_rating'    => 4.8,
            'review_count'  => 24,
            'tags'          => ['Macrame', 'Wall Art', 'Handcraft', 'Cotton', 'Decor'],

            'short_desc'    => 'Handcrafted with premium cotton cord, this woven tapestry brings a touch of artisanal warmth and texture to any space. Each creation is unique — made with care and intention.',

            'description'   => 'Each piece from Saras Creations is thoughtfully handcrafted using premium cotton cord and sustainably sourced materials. Our artisans bring years of expertise to every knot, ensuring each creation is both beautiful and durable.',

            // ── Thumbnail gallery (first = default main image) ──
            'gallery' => [
                asset('img/banner-img5.webp'),
                asset('img/banner-img1.webp'),
                asset('img/banner-img2.avif'),
                asset('img/cotton-cord.jpg'),
            ],

            // ── Colour swatches ──
            'colors' => [
                ['label' => 'Natural White', 'hex' => '#F5EDE6'],
                ['label' => 'Dusty Sand',    'hex' => '#C9B99A'],
                ['label' => 'Charcoal Grey', 'hex' => '#3a3a3a'],
                ['label' => 'Blush Rose',    'hex' => '#D4A5A5'],
            ],

            // ── Size options ──
            'sizes' => ['Small — 40cm', 'Medium — 60cm', 'Large — 90cm', 'XL — 120cm'],

            // ── Specs table ──
            'specs' => [
                ['label' => 'Material',    'value' => '100% Premium Cotton Cord'],
                ['label' => 'Dimensions',  'value' => '60 cm × 40 cm (Medium)'],
                ['label' => 'Weight',      'value' => '350g'],
                ['label' => 'Colour',      'value' => 'Natural White'],
                ['label' => 'Finish',      'value' => 'Hand-knotted'],
                ['label' => 'Hanging Rod', 'value' => 'Solid Driftwood Included'],
                ['label' => 'Origin',      'value' => 'Handmade in India'],
            ],

            // ── Care instructions ──
            'care' => [
                'Spot clean with a damp cloth only',
                'Avoid prolonged direct sunlight to preserve colour',
                'Do not machine wash or tumble dry',
                'Gently reshape and fluff fibres as needed',
                'Store in a cool, dry place when not in use',
            ],

            // ── Customer reviews ──
            'reviews' => [
                [
                    'name'  => 'Priya S.',
                    'stars' => 5,
                    'date'  => 'Jan 2026',
                    'text'  => 'Absolutely stunning piece. The craftsmanship is exceptional and it looks even better in person. Shipping was fast and carefully packaged.',
                ],
                [
                    'name'  => 'Emma W.',
                    'stars' => 5,
                    'date'  => 'Dec 2025',
                    'text'  => 'I ordered the large size and it fills the wall perfectly. The quality of the cotton cord is superb. Will definitely be ordering again!',
                ],
                [
                    'name'  => 'Riya K.',
                    'stars' => 4,
                    'date'  => 'Nov 2025',
                    'text'  => 'Beautiful work. Very detailed knotting and the natural colour goes with everything. Slight delay in shipping but the product made up for it.',
                ],
            ],
        ];

        // ── Related Products ──
        $relatedProducts = [
            [
                'name'          => 'Macrame Wall Hanging',
                'slug'          => 'macrame-wall-hanging',
                'price'         => 450.00,
                'old_price'     => null,
                'badge'         => 'New',
                'badge_color'   => 'bg-charcoal',
                'img_primary'   => asset('img/banner-img1.webp'),
                'img_secondary' => asset('img/banner-img2.avif'),
            ],
            [
                'name'          => 'Cotton Planter Hanger',
                'slug'          => 'cotton-planter-hanger',
                'price'         => 280.00,
                'old_price'     => 350.00,
                'badge'         => 'Sale',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img2.avif'),
                'img_secondary' => asset('img/banner-img5.webp'),
            ],
            [
                'name'          => 'Twisted Cotton Cord',
                'slug'          => 'twisted-cotton-cord',
                'price'         => 120.00,
                'old_price'     => null,
                'badge'         => null,
                'badge_color'   => '',
                'img_primary'   => asset('img/cotton-cord.jpg'),
                'img_secondary' => asset('img/banner-img1.webp'),
            ],
            [
                'name'          => 'Wooden Decor Set',
                'slug'          => 'wooden-decor-set',
                'price'         => 520.00,
                'old_price'     => 650.00,
                'badge'         => '-20%',
                'badge_color'   => 'bg-rouge',
                'img_primary'   => asset('img/banner-img-9.png'),
                'img_secondary' => asset('img/banner-img1.webp'),
            ],
        ];

        return view('product-detail', compact('product', 'relatedProducts'));
    }

}

