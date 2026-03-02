<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = [
            ['key'=>'all',   'label'=>'All Products',  'icon'=>'fa-grip',             'count'=>12, 'desc'=>'Explore our full handcrafted macramé collection — every piece made with love.'],
            ['key'=>'wall',  'label'=>'Wall Hangings',  'icon'=>'fa-panorama',         'count'=>3,  'desc'=>'Statement wall pieces hand-knotted from premium natural cotton cord.'],
            ['key'=>'plant', 'label'=>'Plant Hangers',  'icon'=>'fa-seedling',         'count'=>3,  'desc'=>'Beautifully woven hangers designed for every plant lover\'s home.'],
            ['key'=>'cord',  'label'=>'Cotton Cords',   'icon'=>'fa-circle-nodes',     'count'=>2,  'desc'=>'Premium single-strand & twisted cords for your own creative projects.'],
            ['key'=>'boho',  'label'=>'Boho Decor',     'icon'=>'fa-star-and-crescent','count'=>3,  'desc'=>'Dreamcatchers, framed mirrors, garlands and more bohemian accents.'],
            ['key'=>'sale',  'label'=>'On Sale',         'icon'=>'fa-tag',              'count'=>5,  'desc'=>'Limited-time discounts on our most-loved pieces — don\'t miss out.'],
        ];

        $products = [
            ['name'=>'Bohemian Wall Hanging',     'category'=>'wall',  'price'=>230.00,'old'=>null,   'badge'=>['text'=>'Hot', 'class'=>'bg-rouge'], 'rating'=>5,'reviews'=>48,'img'=>'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80'],
            ['name'=>'Macramé Plant Basket',       'category'=>'plant', 'price'=>185.00,'old'=>null,   'badge'=>['text'=>'New', 'class'=>'bg-charcoal'],'rating'=>4,'reviews'=>29,'img'=>'https://images.unsplash.com/photo-1597048825765-c9e36b526957?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1611735341450-74d61e660ad2?w=600&q=80'],
            ['name'=>'Cascading Plant Hanger',     'category'=>'plant', 'price'=>320.00,'old'=>null,   'badge'=>null,                                  'rating'=>5,'reviews'=>61,'img'=>'https://images.unsplash.com/photo-1603208851090-a2ce45a1dbc4?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1604244803965-ac9c2f2e2efe?w=600&q=80'],
            ['name'=>'Twisted Cotton Cord Bundle', 'category'=>'cord',  'price'=>145.00,'old'=>195.00, 'badge'=>['text'=>'Sale','class'=>'bg-sand'],   'rating'=>4,'reviews'=>17,'img'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1530092376999-2431865aa8df?w=600&q=80'],
            ['name'=>'Boho Wall Art Panel',        'category'=>'boho',  'price'=>98.00, 'old'=>null,   'badge'=>null,                                  'rating'=>4,'reviews'=>33,'img'=>'https://images.unsplash.com/photo-1582582621959-48d27397dc69?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?w=600&q=80'],
            ['name'=>'Knotted Statement Runner',   'category'=>'wall',  'price'=>890.00,'old'=>null,   'badge'=>['text'=>'Hot', 'class'=>'bg-rouge'],  'rating'=>5,'reviews'=>52,'img'=>'https://images.unsplash.com/photo-1611735341450-74d61e660ad2?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=600&q=80'],
            ['name'=>'Tassel Celebration Garland', 'category'=>'boho',  'price'=>540.00,'old'=>null,   'badge'=>null,                                  'rating'=>5,'reviews'=>41,'img'=>'https://images.unsplash.com/photo-1604244803965-ac9c2f2e2efe?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1597048825765-c9e36b526957?w=600&q=80'],
            ['name'=>'Woven Tapestry Hanging',     'category'=>'wall',  'price'=>630.00,'old'=>900.00, 'badge'=>['text'=>'-30%','class'=>'bg-rouge'],  'rating'=>4,'reviews'=>22,'img'=>'https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1582582621959-48d27397dc69?w=600&q=80'],
            ['name'=>'Boho Dream Catcher',         'category'=>'boho',  'price'=>210.00,'old'=>null,   'badge'=>null,                                  'rating'=>5,'reviews'=>38,'img'=>'https://images.unsplash.com/photo-1530092376999-2431865aa8df?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1603208851090-a2ce45a1dbc4?w=600&q=80'],
            ['name'=>'Natural Cord Bundle ×3',     'category'=>'cord',  'price'=>110.00,'old'=>155.00, 'badge'=>['text'=>'Sale','class'=>'bg-sand'],   'rating'=>4,'reviews'=>19,'img'=>'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1611735341450-74d61e660ad2?w=600&q=80'],
            ['name'=>'Macramé Framed Mirror',      'category'=>'boho',  'price'=>680.00,'old'=>null,   'badge'=>['text'=>'Top', 'class'=>'bg-charcoal'],'rating'=>5,'reviews'=>44,'img'=>'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1597048825765-c9e36b526957?w=600&q=80'],
            ['name'=>'Simple Planter Hanger',      'category'=>'plant', 'price'=>28.00, 'old'=>45.00,  'badge'=>['text'=>'-40%','class'=>'bg-rouge'],  'rating'=>4,'reviews'=>15,'img'=>'https://images.unsplash.com/photo-1603208851090-a2ce45a1dbc4?w=600&q=80','img2'=>'https://images.unsplash.com/photo-1604244803965-ac9c2f2e2efe?w=600&q=80'],
        ];

        $byCategory = collect($products)->groupBy('category');
        $saleProducts = collect($products)
            ->filter(fn ($p) => $p['old'] !== null)
            ->values()
            ->toArray();

        return view('category', [
            'categories'   => $categories,
            'products'     => $products,
            'byCategory'   => $byCategory,
            'saleProducts' => $saleProducts,
        ]);
    }
}

