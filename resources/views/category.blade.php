{{-- resources/views/shop/category.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shop — Sara's Creations</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,700&family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream:       '#FAF6F1',
                        charcoal:    '#1e1e1e',
                        rouge:       '#d94f4f',
                        blush:       '#E8C9B8',
                        sand:        '#C9B49A',
                        'warm-white':'#FDFAF7',
                    },
                    fontFamily: {
                        raleway:    ['Raleway', 'sans-serif'],
                        cormorant:  ['"Cormorant Garamond"', 'serif'],
                    },
                    letterSpacing: {
                        'ultra':  '0.35em',
                        'wide-1': '0.12em',
                        'wide-2': '0.18em',
                        'wide-3': '0.2em',
                        'wide-4': '0.22em',
                        'wide-5': '0.25em',
                        'wide-6': '0.3em',
                        'wide-7': '0.32em',
                    },
                    fontSize: {
                        '2xs':  ['0.52rem', { lineHeight: '1' }],
                        '3xs':  ['0.45rem', { lineHeight: '1' }],
                        'nav':  ['0.63rem', { lineHeight: '1' }],
                        'tag':  ['0.54rem', { lineHeight: '1' }],
                        'xs2':  ['0.58rem', { lineHeight: '1' }],
                        'xs3':  ['0.6rem',  { lineHeight: '1' }],
                        'xs4':  ['0.62rem', { lineHeight: '1' }],
                        'xs5':  ['0.65rem', { lineHeight: '1' }],
                        'xs6':  ['0.68rem', { lineHeight: '1.5' }],
                        'xs7':  ['0.72rem', { lineHeight: '1' }],
                    },
                    boxShadow: {
                        'dropdown': '0 20px 60px rgba(0,0,0,0.10), 0 4px 12px rgba(0,0,0,0.06)',
                    },
                    gridTemplateColumns: {
                        'shop-4': 'repeat(4, 1fr)',
                        'shop-3': 'repeat(3, 1fr)',
                        'shop-5': 'repeat(5, 1fr)',
                        'shop-2': 'repeat(2, 1fr)',
                        'dropdown': 'repeat(3, 1fr)',
                    },
                    maxWidth: {
                        'screen-shop': '1400px',
                    },
                    transitionTimingFunction: {
                        'spring': 'cubic-bezier(0.34,1.56,0.64,1)',
                        'smooth': 'cubic-bezier(0.4,0,0.2,1)',
                    },
                    keyframes: {
                        chipPop: {
                            'from': { opacity: '0', transform: 'scale(0.75)' },
                            'to':   { opacity: '1', transform: 'scale(1)' },
                        },
                        marquee: {
                            '0%':   { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' },
                        },
                    },
                    animation: {
                        'chip-pop': 'chipPop 0.3s cubic-bezier(0.34,1.56,0.64,1)',
                    },
                    backdropBlur: {
                        'nav': '16px',
                    },
                    height: {
                        'nav': '72px',
                    },
                }
            }
        }
    </script>

    <style>
        /* ── Noise texture overlay ── */
        body::before {
            content: ''; position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 9000; opacity: 0.4;
        }

        /* ── Page hero decorative circle ── */
        .page-hero::before {
            content: ''; position: absolute;
            top: -100px; right: -100px;
            width: 500px; height: 500px;
            border-radius: 50%;
            border: 1px solid rgba(217,79,79,0.1);
            pointer-events: none;
        }

        /* ── Nav underline slide effect ── */
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 0; height: 1.5px;
            background: #d94f4f;
            transition: width 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        .nav-item:hover .caret { transform: rotate(180deg); opacity: 1; }

        /* ── Dropdown reveal ── */
        .nav-dropdown {
            position: absolute;
            top: calc(100% + 20px);
            left: 50%;
            transform: translateX(-50%) translateY(-8px);
            min-width: 620px;
            background: white;
            border-top: 2px solid #d94f4f;
            box-shadow: 0 20px 60px rgba(0,0,0,0.10), 0 4px 12px rgba(0,0,0,0.06);
            opacity: 0; pointer-events: none;
            transition: opacity 0.3s ease, transform 0.3s cubic-bezier(0.4,0,0.2,1);
            display: grid; grid-template-columns: repeat(3,1fr);
            z-index: 700;
        }
        .nav-item:hover .nav-dropdown {
            opacity: 1; pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }

        /* ── Dropdown link hover ── */
        .dropdown-link { transition: color 0.2s, padding-left 0.2s; }
        .dropdown-link:hover { color: #d94f4f; padding-left: 6px; }

        /* ── Featured CTA underline ── */
        .dropdown-featured-cta::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 100%; height: 1.5px; background: #d94f4f;
            transform: scaleX(0.4); transform-origin: left;
            transition: transform 0.3s ease;
        }
        .dropdown-featured-cta:hover::after { transform: scaleX(1); }

        /* ── Mobile menu links ── */
        #mobileMenu a { transition: color 0.2s, padding-left 0.2s; }
        #mobileMenu a:hover { color: #d94f4f; padding-left: 32px; }

        /* ── Cat tab border-bottom active indicator ── */
        .cat-tab { border-bottom: 2px solid transparent; transition: color 0.25s; }
        .cat-tab.active { border-bottom-color: #d94f4f; color: #1e1e1e; }
        .cat-tab:hover .cat-icon { transform: scale(1.2); }
        .cat-tab.active .cat-icon { color: #d94f4f; }
        .cat-tab.active .cat-count {
            background: rgba(217,79,79,0.1);
            color: #d94f4f;
        }

        /* ── Scrollbar hide for cat-bar ── */
        #catBar::-webkit-scrollbar { display: none; }
        #catBar { scrollbar-width: none; }

        /* ── Category heading slide-up animation ── */
        .cat-heading { opacity: 0; transform: translateY(20px); transition: opacity 0.5s ease, transform 0.5s ease; }
        .cat-heading.visible { opacity: 1; transform: translateY(0); }
        .cat-heading-line { width: 0; height: 1px; background: #C9B49A; margin-top: 10px; transition: width 0.9s cubic-bezier(0.4,0,0.2,1) 0.3s; }
        .cat-heading.visible .cat-heading-line { width: 60px; }

        /* ── Tab panels ── */
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        /* ── Product grid filtering state ── */
        .products-grid.filtering { opacity: 0.3; pointer-events: none; }

        /* ── Product card reveal ── */
        .product-card { opacity: 0; transform: translateY(28px); transition: opacity 0.55s cubic-bezier(0.4,0,0.2,1), transform 0.55s cubic-bezier(0.4,0,0.2,1); }
        .product-card.visible { opacity: 1; transform: translateY(0); }

        /* ── Card image crossfade ── */
        .card-img      { transition: opacity 0.55s ease, transform 0.7s cubic-bezier(0.4,0,0.2,1); }
        .card-img-hover{ opacity: 0; transition: opacity 0.55s ease; }
        .product-card:hover .card-img       { opacity: 0; transform: scale(1.04); }
        .product-card:hover .card-img-hover { opacity: 1; }

        /* ── Card overlay + buttons ── */
        .card-overlay { transition: opacity 0.3s; }
        .product-card:hover .card-overlay { opacity: 1; }
        .btn-cart {
            transform: translateY(10px); opacity: 0;
            transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1) 0.04s, opacity 0.25s ease 0.04s, background 0.25s, color 0.25s;
        }
        .btn-view {
            transform: translateY(10px); opacity: 0;
            transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1) 0.1s, opacity 0.25s ease 0.1s, background 0.25s;
        }
        .product-card:hover .btn-cart,
        .product-card:hover .btn-view { transform: translateY(0); opacity: 1; }
        .btn-cart:hover { background: #1e1e1e; color: white; }
        .btn-view:hover { background: rgba(255,255,255,0.15); border-color: white; }

        /* ── Wish btn active state ── */
        .wish-btn.on { color: #d94f4f; background: rgba(217,79,79,0.07); border: 1px solid rgba(217,79,79,0.18); }

        /* ── Load more button fill animation ── */
        .btn-load::before {
            content: ''; position: absolute; inset: 0;
            background: #1e1e1e;
            transform: scaleX(0); transform-origin: left;
            transition: transform 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .btn-load:hover::before { transform: scaleX(1); }
        .btn-load:hover { color: white; }
        .btn-load span { position: relative; z-index: 1; }

        /* ── Scroll reveal ── */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .reveal.visible { opacity: 1; transform: none; }

        /* ── Sort select custom arrow ── */
        .sort-select {
            background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%231e1e1e' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
        }
        .sort-select:focus { border-color: #d94f4f; outline: none; }

        /* ── chip pop animation ── */
        .chip { animation: chipPop 0.3s cubic-bezier(0.34,1.56,0.64,1); }
        @keyframes chipPop { from{opacity:0;transform:scale(0.75)} to{opacity:1;transform:scale(1)} }

        /* ── Responsive grid overrides ── */
        @media (max-width: 1200px) {
            .products-grid { grid-template-columns: repeat(3,1fr) !important; }
        }
        @media (max-width: 900px) {
            .nav-menu { display: none !important; }
            .nav-hamburger { display: flex !important; }
            .products-grid { grid-template-columns: repeat(2,1fr) !important; gap: 14px !important; }
        }
        @media (max-width: 480px) {
            .products-grid { grid-template-columns: repeat(2,1fr) !important; gap: 10px !important; }
            .view-btns { display: none; }
        }
    </style>
</head>

<body class="font-raleway bg-warm-white text-charcoal overflow-x-hidden">

@php
    /* ═══════════════════════════════════════════
       CATEGORIES — powers: nav dropdown | cat-bar tabs | panel headings
    ═══════════════════════════════════════════ */
    $categories = [
        ['key'=>'all',   'label'=>'All Products',  'icon'=>'fa-grip',             'count'=>12, 'desc'=>'Explore our full handcrafted macramé collection — every piece made with love.'],
        ['key'=>'wall',  'label'=>'Wall Hangings',  'icon'=>'fa-panorama',         'count'=>3,  'desc'=>'Statement wall pieces hand-knotted from premium natural cotton cord.'],
        ['key'=>'plant', 'label'=>'Plant Hangers',  'icon'=>'fa-seedling',         'count'=>3,  'desc'=>'Beautifully woven hangers designed for every plant lover\'s home.'],
        ['key'=>'cord',  'label'=>'Cotton Cords',   'icon'=>'fa-circle-nodes',     'count'=>2,  'desc'=>'Premium single-strand & twisted cords for your own creative projects.'],
        ['key'=>'boho',  'label'=>'Boho Decor',     'icon'=>'fa-star-and-crescent','count'=>3,  'desc'=>'Dreamcatchers, framed mirrors, garlands and more bohemian accents.'],
        ['key'=>'sale',  'label'=>'On Sale',         'icon'=>'fa-tag',              'count'=>5,  'desc'=>'Limited-time discounts on our most-loved pieces — don\'t miss out.'],
    ];

    /* ═══════════════════════════════════════════
       PRODUCTS
    ═══════════════════════════════════════════ */
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

    $byCategory  = collect($products)->groupBy('category');
    $saleProducts = collect($products)->filter(fn($p) => $p['old'] !== null)->values()->toArray();
@endphp

{{-- ══════════════ NAV ══════════════ --}}
<nav class="sticky top-0 z-[600] h-nav flex items-center justify-between px-[60px] bg-[rgba(253,250,247,0.92)] backdrop-blur-nav border-b border-[rgba(30,30,30,0.07)]">

    <a href="#" class="font-cormorant text-[1.85rem] font-bold tracking-[-0.02em] text-charcoal no-underline flex-shrink-0">
        Sara's<span class="text-rouge">.</span>
    </a>

    {{-- Desktop menu --}}
    <ul class="nav-menu hidden lg:flex gap-[40px] list-none">
        <li class="nav-item relative">
            <a href="#" class="nav-link relative flex items-center gap-[5px] pb-[3px] text-nav font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[250ms] whitespace-nowrap">Home</a>
        </li>

        {{-- Shop with dropdown --}}
        <li class="nav-item relative">
            <a href="#" class="nav-link active relative flex items-center gap-[5px] pb-[3px] text-nav font-bold tracking-wide-4 uppercase text-rouge no-underline whitespace-nowrap">
                Shop <i class="fas fa-chevron-down caret text-[0.45rem] opacity-50 mt-[1px] transition-transform duration-300"></i>
            </a>
            <div class="nav-dropdown">
                {{-- Column 1 --}}
                <div class="p-[28px_24px] border-r border-[rgba(30,30,30,0.06)]">
                    <p class="text-2xs font-extrabold tracking-wide-6 uppercase text-rouge mb-4 pb-[10px] border-b border-[rgba(30,30,30,0.07)]">Categories</p>
                    @foreach($categories as $cat)
                        @if($loop->index < 4)
                            <a href="#" class="dropdown-link flex items-center justify-between py-2 text-xs6 font-semibold tracking-[0.06em] text-[rgba(30,30,30,0.65)] no-underline border-b border-[rgba(30,30,30,0.04)] last:border-b-0"
                               onclick="event.preventDefault();switchCat('{{ $cat['key'] }}')">
                                {{ $cat['label'] }}
                                <span class="text-2xs font-bold text-[rgba(30,30,30,0.22)]">{{ $cat['count'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
                {{-- Column 2 --}}
                <div class="p-[28px_24px] border-r border-[rgba(30,30,30,0.06)]">
                    <p class="text-2xs font-extrabold tracking-wide-6 uppercase text-rouge mb-4 pb-[10px] border-b border-[rgba(30,30,30,0.07)]">More</p>
                    @foreach($categories as $cat)
                        @if($loop->index >= 4)
                            <a href="#" class="dropdown-link flex items-center justify-between py-2 text-xs6 font-semibold tracking-[0.06em] text-[rgba(30,30,30,0.65)] no-underline border-b border-[rgba(30,30,30,0.04)] last:border-b-0"
                               onclick="event.preventDefault();switchCat('{{ $cat['key'] }}')">
                                {{ $cat['label'] }}
                                <span class="text-2xs font-bold text-[rgba(30,30,30,0.22)]">{{ $cat['count'] }}</span>
                            </a>
                        @endif
                    @endforeach
                    <a href="#" class="dropdown-link flex items-center justify-between py-2 text-xs6 font-semibold mt-3 text-rouge no-underline">New Arrivals →</a>
                </div>
                {{-- Column 3: featured --}}
                <div class="p-[28px_24px] bg-cream flex flex-col justify-center gap-[10px]">
                    <p class="text-2xs font-extrabold tracking-wide-6 uppercase text-rouge">✦ Featured</p>
                    <p class="font-cormorant text-[1.3rem] font-semibold italic text-charcoal leading-[1.25]">2026<br/>Collection</p>
                    <p class="text-xs6 text-[rgba(30,30,30,0.42)] leading-[1.6]">Explore our latest handcrafted pieces — made with love.</p>
                    <a href="#" class="dropdown-featured-cta relative inline-block mt-1 text-xs2 font-bold tracking-wide-3 uppercase text-charcoal no-underline pb-[2px]">Shop Now →</a>
                </div>
            </div>
        </li>

        <li class="nav-item relative"><a href="#" class="nav-link relative flex items-center pb-[3px] text-nav font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[250ms] whitespace-nowrap">Blogs</a></li>
        <li class="nav-item relative"><a href="#" class="nav-link relative flex items-center pb-[3px] text-nav font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[250ms] whitespace-nowrap">About Us</a></li>
        <li class="nav-item relative"><a href="#" class="nav-link relative flex items-center pb-[3px] text-nav font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[250ms] whitespace-nowrap">Contact</a></li>
    </ul>

    <div class="flex items-center gap-[10px]">
        {{-- Icons --}}
        <a href="#" class="w-[38px] h-[38px] border border-[rgba(30,30,30,0.18)] rounded-full flex items-center justify-center text-charcoal text-[0.7rem] no-underline transition-all duration-[250ms] hover:bg-charcoal hover:text-white hover:border-charcoal">
            <i class="fas fa-search"></i>
        </a>
        <a href="#" class="relative w-[38px] h-[38px] border border-[rgba(30,30,30,0.18)] rounded-full flex items-center justify-center text-charcoal text-[0.7rem] no-underline transition-all duration-[250ms] hover:bg-charcoal hover:text-white hover:border-charcoal">
            <i class="fas fa-shopping-bag"></i>
            <span class="absolute -top-[4px] -right-[4px] w-[16px] h-[16px] rounded-full bg-rouge text-white text-[9px] font-bold flex items-center justify-center">0</span>
        </a>
        {{-- Hamburger --}}
        <button class="nav-hamburger hidden w-[38px] h-[38px] border border-[rgba(30,30,30,0.18)] rounded-full bg-white items-center justify-center text-[0.75rem] text-charcoal cursor-pointer transition-all duration-[250ms] hover:bg-charcoal hover:text-white hover:border-charcoal"
                onclick="document.getElementById('mobileMenu').style.display=document.getElementById('mobileMenu').style.display==='block'?'none':'block'">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>

{{-- Mobile menu --}}
<div id="mobileMenu" class="hidden bg-white border-t border-[rgba(30,30,30,0.07)] sticky top-[72px] z-[590]">
    <a href="#" class="block px-6 py-3 text-xs5 font-bold tracking-wide-3 uppercase text-charcoal no-underline border-b border-[rgba(30,30,30,0.06)]">Home</a>
    @foreach($categories as $cat)
        <a href="#" class="block px-6 py-3 text-xs5 font-bold tracking-wide-3 uppercase text-charcoal no-underline border-b border-[rgba(30,30,30,0.06)]"
           onclick="event.preventDefault();switchCat('{{ $cat['key'] }}');document.getElementById('mobileMenu').style.display='none'">
            {{ $cat['label'] }} ({{ $cat['count'] }})
        </a>
    @endforeach
    <a href="#" class="block px-6 py-3 text-xs5 font-bold tracking-wide-3 uppercase text-charcoal no-underline border-b border-[rgba(30,30,30,0.06)]">Blogs</a>
    <a href="#" class="block px-6 py-3 text-xs5 font-bold tracking-wide-3 uppercase text-charcoal no-underline border-b border-[rgba(30,30,30,0.06)]">About Us</a>
    <a href="#" class="block px-6 py-3 text-xs5 font-bold tracking-wide-3 uppercase text-charcoal no-underline">Contact</a>
</div>

{{-- ══════════════ PAGE HERO ══════════════ --}}
<div class="page-hero relative bg-charcoal px-[60px] pt-[72px] pb-[56px] overflow-hidden">
    {{-- breadcrumb --}}
    <div class="flex items-center gap-[10px] mb-[22px] text-xs2 font-bold tracking-wide-4 uppercase text-[rgba(250,246,241,0.3)]">
        <a href="#" class="text-[rgba(250,246,241,0.3)] no-underline hover:text-rouge transition-colors duration-[250ms]">Home</a>
        <span class="text-[rgba(250,246,241,0.12)]">›</span>
        <span class="text-rouge">Shop</span>
    </div>
    <h1 class="font-cormorant font-bold italic text-cream leading-none mb-[14px] text-[clamp(3rem,6vw,5.5rem)]">The Collection</h1>
    <div class="flex items-center gap-[18px] text-xs3 font-bold tracking-wide-3 uppercase text-[rgba(250,246,241,0.3)]">
        <span>Handcrafted Macramé</span>
        <div class="w-[3px] h-[3px] rounded-full bg-rouge flex-shrink-0"></div>
        <span>Cotton Arts</span>
        <div class="w-[3px] h-[3px] rounded-full bg-rouge flex-shrink-0"></div>
        <span>Boho Decor</span>
    </div>
    {{-- gradient accent line --}}
    <div class="absolute bottom-0 left-0 right-0 h-[3px]" style="background:linear-gradient(90deg,#d94f4f,#E8C9B8,#C9B49A,#d94f4f)"></div>
</div>

{{-- ══════════════ CATEGORY TABS BAR ══════════════ --}}
<div class="sticky top-[72px] z-[400] bg-cream border-b border-[rgba(30,30,30,0.08)]">
    <div id="catBar" class="max-w-screen-shop mx-auto px-[60px] flex items-stretch overflow-x-auto">
        @foreach($categories as $cat)
            <button
                class="cat-tab {{ $loop->first ? 'active' : '' }} flex items-center gap-2 px-[26px] py-[18px] text-[0.61rem] font-bold tracking-wide-3 uppercase text-[rgba(30,30,30,0.42)] bg-transparent border-none cursor-pointer whitespace-nowrap flex-shrink-0"
                id="ctab-{{ $cat['key'] }}"
                onclick="switchCat('{{ $cat['key'] }}')">
                <i class="fas {{ $cat['icon'] }} cat-icon text-[0.85rem] transition-transform duration-300"></i>
                {{ $cat['label'] }}
                <span class="cat-count text-[0.54rem] font-bold bg-[rgba(30,30,30,0.07)] text-[rgba(30,30,30,0.38)] px-[7px] py-[2px] rounded-[20px] transition-all duration-[250ms]">{{ $cat['count'] }}</span>
            </button>
        @endforeach
    </div>
</div>

{{-- ══════════════ TOOLBAR ══════════════ --}}
<div class="max-w-screen-shop mx-auto px-[60px] py-[22px] flex items-center justify-between flex-wrap gap-[14px] border-b border-[rgba(30,30,30,0.06)]">
    <div class="flex items-center gap-[14px] flex-wrap">
        <span class="text-xs4 font-bold tracking-wide-1 uppercase text-[rgba(30,30,30,0.42)]">
            <strong id="countNum" class="text-charcoal">{{ count($products) }}</strong> Products
        </span>
        <div class="flex gap-2 flex-wrap" id="chipsWrap"></div>
    </div>
    <div class="flex items-center gap-[10px]">
        <select class="sort-select py-[9px] pl-[14px] pr-[32px] border-[1.5px] border-[rgba(30,30,30,0.13)] bg-white appearance-none cursor-pointer font-raleway text-xs4 font-semibold text-charcoal tracking-[0.08em] transition-colors duration-[250ms]"
                onchange="sortProducts(this.value)">
            <option value="">Featured</option>
            <option value="price-asc">Price: Low–High</option>
            <option value="price-desc">Price: High–Low</option>
            <option value="rating">Top Rated</option>
        </select>
        {{-- view toggle buttons --}}
        <div class="view-btns flex gap-0">
            <button class="view-btn w-[36px] h-[36px] border-[1.5px] border-[rgba(30,30,30,0.13)] bg-white flex items-center justify-center cursor-pointer text-[rgba(30,30,30,0.42)] text-[0.68rem] transition-all duration-[220ms] bg-charcoal text-white border-charcoal"
                    onclick="setView('',this)" title="4 columns">
                <i class="fas fa-th"></i>
            </button>
            <button class="view-btn w-[36px] h-[36px] border-[1.5px] border-[rgba(30,30,30,0.13)] bg-white flex items-center justify-center cursor-pointer text-[rgba(30,30,30,0.42)] text-[0.68rem] transition-all duration-[220ms] hover:bg-charcoal hover:text-white hover:border-charcoal"
                    onclick="setView('cols-3',this)" title="3 columns">
                <i class="fas fa-th-large"></i>
            </button>
            <button class="view-btn w-[36px] h-[36px] border-[1.5px] border-[rgba(30,30,30,0.13)] bg-white flex items-center justify-center cursor-pointer text-[rgba(30,30,30,0.42)] text-[0.68rem] transition-all duration-[220ms] hover:bg-charcoal hover:text-white hover:border-charcoal"
                    onclick="setView('cols-5',this)" title="5 columns">
                <i class="fas fa-border-all"></i>
            </button>
        </div>
    </div>
</div>

{{-- ══════════════ PRODUCTS SECTION ══════════════ --}}
<div class="max-w-screen-shop mx-auto px-[60px] pt-[40px] pb-[80px]">

    {{-- ─── Reusable product card macro ─── --}}
    {{-- We define the card HTML inline in each panel since Blade doesn't have real macros without components --}}

    {{-- ─ ALL PANEL ─ --}}
    <div class="tab-panel active" id="panel-all">

        {{-- Heading --}}
        <div class="cat-heading flex items-end justify-between mb-9 gap-4" id="heading-all">
            <div>
                <p class="text-tag font-extrabold tracking-wide-7 uppercase text-rouge mb-2">✦ Full Collection</p>
                <h2 class="font-cormorant font-bold italic text-charcoal leading-none text-[clamp(2rem,3.5vw,3rem)]">All Products</h2>
                <p class="text-xs7 text-[rgba(30,30,30,0.42)] leading-[1.7] mt-2 max-w-[420px]">Every handcrafted piece — from statement wall art to delicate plant hangers.</p>
                <div class="cat-heading-line"></div>
            </div>
        </div>

        {{-- Grid --}}
        <div class="products-grid grid grid-cols-shop-4 gap-7 transition-opacity duration-[350ms]" id="grid-all">
            @foreach($products as $i => $p)
                <div class="product-card" style="transition-delay:{{ $i * 55 }}ms" data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}">
                    {{-- Image wrap --}}
                    <div class="relative overflow-hidden bg-cream mb-[14px]" style="padding-bottom:120%">
                        <img class="card-img absolute inset-0 w-full h-full object-cover" src="{{ $p['img'] }}" alt="{{ $p['name'] }}"/>
                        <img class="card-img-hover absolute inset-0 w-full h-full object-cover" src="{{ $p['img2'] }}" alt="{{ $p['name'] }}"/>
                        {{-- Overlay --}}
                        <div class="card-overlay absolute inset-0 bg-[rgba(30,30,30,0.07)] opacity-0 flex flex-col items-center justify-end pb-[18px] gap-2">
                            <button class="btn-cart px-[22px] py-[10px] bg-white text-charcoal border-none cursor-pointer font-raleway text-xs2 font-bold tracking-wide-3 uppercase">Add to Cart</button>
                            <button class="btn-view px-[18px] py-[6px] bg-transparent text-white border border-[rgba(255,255,255,0.45)] cursor-pointer font-raleway text-[0.56rem] font-bold tracking-wide-2 uppercase">Quick View</button>
                        </div>
                        {{-- Badge --}}
                        @if($p['badge'])
                            <span class="absolute top-3 left-0 z-[2] px-[11px] py-[5px] {{ $p['badge']['class'] }} text-white text-2xs font-extrabold tracking-wide-2 uppercase">{{ $p['badge']['text'] }}</span>
                        @endif
                        {{-- Wishlist --}}
                        <button class="wish-btn absolute top-3 right-3 z-[2] w-[32px] h-[32px] rounded-full bg-[rgba(253,250,247,0.82)] backdrop-blur-sm border-none cursor-pointer flex items-center justify-center text-[0.72rem] text-[rgba(30,30,30,0.38)] transition-all duration-[250ms] hover:scale-[1.18] hover:text-rouge hover:bg-white"
                                onclick="toggleWish(this)">
                            <i class="fa-regular fa-heart"></i>
                        </button>
                    </div>
                    {{-- Info --}}
                    <div class="text-center">
                        <p class="text-tag font-bold tracking-wide-5 uppercase text-[rgba(30,30,30,0.42)] mb-[5px]">
                            {{ collect($categories)->firstWhere('key',$p['category'])['label'] ?? '' }}
                        </p>
                        <h3 class="font-cormorant text-[1.05rem] font-semibold text-charcoal mb-[5px]">{{ $p['name'] }}</h3>
                        <div class="flex items-center justify-center gap-[2px] mb-[6px]">
                            @for($s=1;$s<=5;$s++)
                                <span class="text-[0.55rem] {{ $s<=$p['rating'] ? 'text-[#d4a843]' : 'text-[#e0d4c0]' }}">★</span>
                            @endfor
                            <span class="text-[0.56rem] text-[rgba(30,30,30,0.42)] ml-1">({{ $p['reviews'] }})</span>
                        </div>
                        <p class="font-cormorant text-[1.05rem] font-semibold text-charcoal">
                            @if($p['old'])
                                <span class="text-rouge">${{ number_format($p['price'],2) }}</span>
                                <del class="text-[rgba(30,30,30,0.28)] text-[0.85rem] ml-[5px]">${{ number_format($p['old'],2) }}</del>
                            @else
                                <span>${{ number_format($p['price'],2) }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="reveal flex justify-center mt-14">
            <button class="btn-load relative overflow-hidden border-[1.5px] border-charcoal px-[52px] py-[14px] font-raleway text-xs5 font-bold tracking-wide-5 uppercase text-charcoal bg-transparent cursor-pointer transition-colors duration-[350ms]"
                    onclick="handleLoadMore(this)">
                <span>Load More</span>
            </button>
        </div>
    </div>

    {{-- ─── Per-category panels — @foreach $categories ─── --}}
    @foreach($categories as $cat)
        @if($cat['key'] === 'all') @continue @endif
        @php
            $catProds = $cat['key'] === 'sale'
                ? $saleProducts
                : ($byCategory[$cat['key']] ?? collect())->toArray();
        @endphp
        <div class="tab-panel" id="panel-{{ $cat['key'] }}">

            {{-- Heading --}}
            <div class="cat-heading flex items-end justify-between mb-9 gap-4" id="heading-{{ $cat['key'] }}">
                <div>
                    <p class="text-tag font-extrabold tracking-wide-7 uppercase text-rouge mb-2">✦ {{ $cat['label'] }}</p>
                    <h2 class="font-cormorant font-bold italic text-charcoal leading-none text-[clamp(2rem,3.5vw,3rem)]">{{ $cat['label'] }}</h2>
                    <p class="text-xs7 text-[rgba(30,30,30,0.42)] leading-[1.7] mt-2 max-w-[420px]">{{ $cat['desc'] }}</p>
                    <div class="cat-heading-line"></div>
                </div>
                <p class="text-xs4 font-bold tracking-wide-1 uppercase text-[rgba(30,30,30,0.42)] pb-[6px]">
                    {{ count($catProds) }} items
                </p>
            </div>

            {{-- Grid --}}
            <div class="products-grid grid grid-cols-shop-4 gap-7 transition-opacity duration-[350ms]" id="grid-{{ $cat['key'] }}">
                @if(count($catProds) === 0)
                    <div class="col-span-full text-center py-[80px] px-5">
                        <div class="text-[3rem] text-[rgba(30,30,30,0.08)] mb-5"><i class="fas fa-leaf"></i></div>
                        <h3 class="font-cormorant text-[2rem] italic text-charcoal mb-2">Coming soon</h3>
                        <p class="text-[0.75rem] text-[rgba(30,30,30,0.42)]">We're adding new pieces to this collection.</p>
                    </div>
                @else
                    @foreach($catProds as $i => $p)
                        <div class="product-card" style="transition-delay:{{ $i * 55 }}ms" data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}">
                            <div class="relative overflow-hidden bg-cream mb-[14px]" style="padding-bottom:120%">
                                <img class="card-img absolute inset-0 w-full h-full object-cover" src="{{ $p['img'] }}" alt="{{ $p['name'] }}"/>
                                <img class="card-img-hover absolute inset-0 w-full h-full object-cover" src="{{ $p['img2'] }}" alt="{{ $p['name'] }}"/>
                                <div class="card-overlay absolute inset-0 bg-[rgba(30,30,30,0.07)] opacity-0 flex flex-col items-center justify-end pb-[18px] gap-2">
                                    <button class="btn-cart px-[22px] py-[10px] bg-white text-charcoal border-none cursor-pointer font-raleway text-xs2 font-bold tracking-wide-3 uppercase">Add to Cart</button>
                                    <button class="btn-view px-[18px] py-[6px] bg-transparent text-white border border-[rgba(255,255,255,0.45)] cursor-pointer font-raleway text-[0.56rem] font-bold tracking-wide-2 uppercase">Quick View</button>
                                </div>
                                @if($p['badge'])
                                    <span class="absolute top-3 left-0 z-[2] px-[11px] py-[5px] {{ $p['badge']['class'] }} text-white text-2xs font-extrabold tracking-wide-2 uppercase">{{ $p['badge']['text'] }}</span>
                                @endif
                                <button class="wish-btn absolute top-3 right-3 z-[2] w-[32px] h-[32px] rounded-full bg-[rgba(253,250,247,0.82)] backdrop-blur-sm border-none cursor-pointer flex items-center justify-center text-[0.72rem] text-[rgba(30,30,30,0.38)] transition-all duration-[250ms] hover:scale-[1.18] hover:text-rouge hover:bg-white"
                                        onclick="toggleWish(this)">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            </div>
                            <div class="text-center">
                                <p class="text-tag font-bold tracking-wide-5 uppercase text-[rgba(30,30,30,0.42)] mb-[5px]">{{ $cat['label'] }}</p>
                                <h3 class="font-cormorant text-[1.05rem] font-semibold text-charcoal mb-[5px]">{{ $p['name'] }}</h3>
                                <div class="flex items-center justify-center gap-[2px] mb-[6px]">
                                    @for($s=1;$s<=5;$s++)
                                        <span class="text-[0.55rem] {{ $s<=$p['rating'] ? 'text-[#d4a843]' : 'text-[#e0d4c0]' }}">★</span>
                                    @endfor
                                    <span class="text-[0.56rem] text-[rgba(30,30,30,0.42)] ml-1">({{ $p['reviews'] }})</span>
                                </div>
                                <p class="font-cormorant text-[1.05rem] font-semibold text-charcoal">
                                    @if($p['old'])
                                        <span class="text-rouge">${{ number_format($p['price'],2) }}</span>
                                        <del class="text-[rgba(30,30,30,0.28)] text-[0.85rem] ml-[5px]">${{ number_format($p['old'],2) }}</del>
                                    @else
                                        <span>${{ number_format($p['price'],2) }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if(count($catProds) > 0)
                <div class="reveal flex justify-center mt-14">
                    <button class="btn-load relative overflow-hidden border-[1.5px] border-charcoal px-[52px] py-[14px] font-raleway text-xs5 font-bold tracking-wide-5 uppercase text-charcoal bg-transparent cursor-pointer transition-colors duration-[350ms]"
                            onclick="handleLoadMore(this)">
                        <span>Load More</span>
                    </button>
                </div>
            @endif
        </div>
    @endforeach

</div>{{-- /products-section --}}

<script>
    const CATS = @json($categories);
    let activeCat = 'all';

    function animateCards(panelId) {
        const panel = document.getElementById(panelId);
        if (!panel) return;
        panel.querySelectorAll('.product-card').forEach((card, i) => {
            card.classList.remove('visible');
            setTimeout(() => card.classList.add('visible'), 80 + i * 60);
        });
        const hKey = panelId.replace('panel-', '');
        const h = document.getElementById('heading-' + hKey);
        if (h) { h.classList.remove('visible'); setTimeout(() => h.classList.add('visible'), 40); }
    }

    window.addEventListener('load', () => animateCards('panel-all'));

    function switchCat(key) {
        if (key === activeCat) return;
        document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
        const tab = document.getElementById('ctab-' + key);
        if (tab) { tab.classList.add('active'); tab.scrollIntoView({ behavior:'smooth', inline:'center', block:'nearest' }); }
        const prev = document.getElementById('panel-' + activeCat);
        if (prev) prev.classList.remove('active');
        const next = document.getElementById('panel-' + key);
        if (next) { next.classList.add('active'); animateCards('panel-' + key); }
        const catData = CATS.find(c => c.key === key);
        document.getElementById('countNum').textContent = catData ? catData.count : '—';
        updateChip(key);
        activeCat = key;
        setTimeout(() => document.querySelector('[id="catBar"]').closest('div').scrollIntoView({ behavior:'smooth', block:'nearest' }), 60);
    }

    function updateChip(key) {
        const wrap = document.getElementById('chipsWrap');
        wrap.innerHTML = '';
        if (key !== 'all') {
            const cat = CATS.find(c => c.key === key);
            if (!cat) return;
            const chip = document.createElement('div');
            chip.className = 'chip inline-flex items-center gap-[6px] bg-[rgba(217,79,79,0.07)] border border-[rgba(217,79,79,0.18)] px-[11px] py-[5px] text-[0.58rem] font-bold tracking-wide-1 uppercase text-rouge cursor-pointer transition-all duration-[200ms] hover:bg-rouge hover:text-white';
            chip.innerHTML = cat.label + ' <span style="opacity:.6">✕</span>';
            chip.onclick = () => switchCat('all');
            wrap.appendChild(chip);
        }
    }

    function sortProducts(val) {
        const grid = document.getElementById('grid-' + activeCat);
        if (!grid) return;
        grid.classList.add('filtering');
        setTimeout(() => {
            const cards = Array.from(grid.querySelectorAll('.product-card'));
            cards.sort((a, b) => {
                const pa = parseFloat(a.dataset.price), pb = parseFloat(b.dataset.price);
                const ra = parseFloat(a.dataset.rating), rb = parseFloat(b.dataset.rating);
                if (val === 'price-asc')  return pa - pb;
                if (val === 'price-desc') return pb - pa;
                if (val === 'rating')     return rb - ra;
                return 0;
            });
            cards.forEach(c => grid.appendChild(c));
            grid.classList.remove('filtering');
            animateCards('panel-' + activeCat);
        }, 320);
    }

    function setView(cls, btn) {
        document.querySelectorAll('.view-btn').forEach(b => {
            b.classList.remove('bg-charcoal','text-white','border-charcoal');
            b.classList.add('bg-white','text-[rgba(30,30,30,0.42)]','border-[rgba(30,30,30,0.13)]');
        });
        btn.classList.add('bg-charcoal','text-white','border-charcoal');
        btn.classList.remove('bg-white','text-[rgba(30,30,30,0.42)]','border-[rgba(30,30,30,0.13)]');
        document.querySelectorAll('.products-grid').forEach(g => {
            g.classList.remove('cols-3','cols-5');
            g.style.gridTemplateColumns = '';
            if (cls === 'cols-3') g.style.gridTemplateColumns = 'repeat(3,1fr)';
            else if (cls === 'cols-5') g.style.gridTemplateColumns = 'repeat(5,1fr)';
            else g.style.gridTemplateColumns = 'repeat(4,1fr)';
        });
        animateCards('panel-' + activeCat);
    }

    function toggleWish(btn) {
        btn.classList.toggle('on');
        btn.querySelector('i').className = btn.classList.contains('on') ? 'fa-solid fa-heart' : 'fa-regular fa-heart';
    }

    function handleLoadMore(btn) {
        btn.innerHTML = '<span><i class="fas fa-spinner fa-spin"></i> Loading…</span>';
        setTimeout(() => { btn.innerHTML = '<span>All Loaded ✓</span>'; btn.style.opacity='0.4'; btn.disabled=true; }, 1200);
    }

    const revObs = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revObs.unobserve(e.target); } });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => revObs.observe(el));
</script>
</body>
</html>
