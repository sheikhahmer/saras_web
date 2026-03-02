<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
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

        return view('home', compact('newArrivals', 'bestSellers', 'itemsSale'));
    }
}

