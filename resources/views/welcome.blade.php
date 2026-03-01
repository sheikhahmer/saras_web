<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SARAS CREATIONS</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream:      '#FAF6F1',
                        charcoal:   '#1e1e1e',
                        rouge:      '#d94f4f',
                        blush:      '#E8C9B8',
                        sand:       '#C9B49A',
                        'warm-white': '#FDFAF7',
                    },
                    fontFamily: {
                        raleway:   ['Raleway', 'sans-serif'],
                        cormorant: ['"Cormorant Garamond"', 'serif'],
                    },
                    letterSpacing: {
                        'ultra': '0.35em',
                        'wide-2': '0.25em',
                        'wide-3': '0.3em',
                        'wide-4': '0.22em',
                        'wide-5': '0.2em',
                        'wide-6': '0.15em',
                    },
                    writingMode: { 'vertical-rl': 'vertical-rl' },
                }
            }
        }
    </script>

    <style>
        :root {
            --cream: #FAF6F1;
            --charcoal: #1e1e1e;
            --rouge: #d94f4f;
            --blush: #E8C9B8;
            --warm-white: #FDFAF7;
        }
        body::before {
            content: '';
            position: fixed; inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 9000; opacity: 0.4;
        }
        .nav-link::after {
            content: '';
            position: absolute; bottom: 0; left: 0;
            width: 0; height: 1.5px;
            background: var(--rouge);
            transition: width 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link:hover::after { width: 100%; }
        .slide-tag {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease 0.3s;
        }
        .slide-title {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s cubic-bezier(0.4,0,0.2,1) 0.5s;
        }
        .slide-btn-wrap {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease 0.75s;
        }
        .owl-item.active .slide-tag,
        .owl-item.active .slide-title,
        .owl-item.active .slide-btn-wrap {
            opacity: 1; transform: translateY(0);
        }
        .shop-btn::before {
            content: '';
            position: absolute; inset: 0;
            background: #1e1e1e;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s cubic-bezier(0.4,0,0.2,1);
            z-index: 0;
        }
        .shop-btn:hover::before { transform: scaleX(1); }
        .shop-btn:hover { color: white; }
        .carousel-nav-btn::before {
            content: '';
            position: absolute; inset: 0;
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .carousel-nav-btn:hover::before { transform: scaleY(1); }
        .nav-prev::before { background: var(--blush); }
        .nav-next::before { background: var(--rouge); }
        .banner-card .bg-img {
            position: absolute; inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1.08);
            transition: transform 0.7s cubic-bezier(0.4,0,0.2,1);
        }
        .banner-card:hover .bg-img { transform: scale(1.0); }
        .banner-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(250,246,241,0.85) 0%, rgba(250,246,241,0.2) 100%);
            transition: background 0.4s ease;
        }
        .banner-card:hover .banner-overlay {
            background: linear-gradient(135deg, rgba(250,246,241,0.7) 0%, rgba(250,246,241,0.05) 100%);
        }
        .banner-link::after {
            content: '';
            position: absolute; bottom: 0; left: 0;
            width: 100%; height: 1.5px;
            background: #1e1e1e;
            transform-origin: right;
            transition: transform 0.35s ease;
        }
        .banner-card:hover .banner-link::after { transform: scaleX(0); transform-origin: left; }
        .banner-link::before {
            content: '';
            position: absolute; bottom: 0; left: 0;
            width: 100%; height: 1.5px;
            background: var(--rouge);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s ease 0.2s;
        }
        .banner-card:hover .banner-link::before { transform: scaleX(1); }
        .reveal        { opacity: 0; transform: translateY(48px);  transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-left   { opacity: 0; transform: translateX(-48px); transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-right  { opacity: 0; transform: translateX(48px);  transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-scale  { opacity: 0; transform: scale(0.92);       transition: opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal.visible, .reveal-left.visible, .reveal-right.visible, .reveal-scale.visible {
            opacity: 1; transform: none;
        }
        @keyframes marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .marquee-inner { animation: marquee 18s linear infinite; }

        @keyframes scrollPulse {
            0%, 100% { opacity: 0.5; transform: scaleY(1); }
            50%       { opacity: 1;   transform: scaleY(0.7); }
        }
        .scroll-line { animation: scrollPulse 2s ease-in-out infinite; }

        body:has(a:hover) .cursor-ring,
        body:has(button:hover) .cursor-ring {
            width: 56px; height: 56px;
            border-color: var(--rouge);
            opacity: 1;
        }
        .writing-vertical { writing-mode: vertical-rl; }
        #mobileMenu a {
            display: block;
            border-bottom: 1px solid rgba(30,30,30,0.06);
            transition: color 0.2s, padding-left 0.2s;
        }
        #mobileMenu a:hover { color: var(--rouge); padding-left: 8px; }
        @media (min-width: 768px) {
            [data-md-width="66.666%"] { width: 66.666% !important; }
            [data-md-width="33.333%"] { width: 33.333% !important; }
        }
        @media (min-width: 1024px) {
            [data-lg="true"] { height: 760px !important; flex: 1 !important; }
        }

        .tab-trigger {
            position: relative;
            padding-bottom: 6px;
            color: #C0B5AA;
            transition: color 0.3s ease;
            background: transparent;
            border: none;
            cursor: none;
            outline: none;
        }
        .tab-trigger::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 0; height: 2px;
            background: var(--charcoal);
            transition: width 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .tab-trigger.active {
            color: var(--charcoal);
        }
        .tab-trigger.active::after {
            width: 100%;
        }
        .tab-trigger:not(.active):hover {
            color: #888;
        }
        .tab-trigger:not(.active):hover::after {
            width: 40%;
            background: var(--rouge);
        }

        .product-card-wrap {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.55s cubic-bezier(0.4,0,0.2,1), transform 0.55s cubic-bezier(0.4,0,0.2,1);
        }
        .product-card-wrap.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .tab-panel {
            display: none;
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.45s ease, transform 0.45s cubic-bezier(0.4,0,0.2,1);
        }
        .tab-panel.active {
            display: grid;
        }
        .tab-panel.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        .product-card-wrap:hover .product-img-primary   { opacity: 0; }
        .product-card-wrap:hover .product-img-secondary { opacity: 1; }
        .product-card-wrap:hover .product-overlay       { opacity: 1; }

        .add-cart-btn {
            transform: translateY(8px);
            transition: transform 0.3s ease, background-color 0.25s ease, color 0.25s ease;
        }
        .product-card-wrap:hover .add-cart-btn {
            transform: translateY(0);
        }

        .wish-btn {
            transition: transform 0.2s ease, color 0.2s ease;
        }
        .wish-btn:hover {
            transform: scale(1.25);
            color: var(--rouge) !important;
        }
        .wish-btn.wishlisted .fa-heart { font-weight: 900; color: var(--rouge); }

        .section-heading-line {
            width: 0;
            transition: width 0.9s cubic-bezier(0.4,0,0.2,1) 0.4s;
        }
        .heading-wrap.visible .section-heading-line {
            width: 60px;
        }
    </style>
</head>

<body class="font-raleway bg-warm-white overflow-x-hidden cursor-none">
@php
    $slides = [
        [
            'image' => asset('img/slider.jpeg'),
            'tag' => '# S A R A S',
            'title' => 'Modern <br>& Minimalistic',
            'button_text' => 'Explore Collection',
            'button_link' => '#',
            'gradient' => 'linear-gradient(105deg,rgba(250,246,241,0.6) 0%,rgba(250,246,241,0.12) 60%)'
        ],
        [
            'image' => asset('img/slider1.jpg'),
            'tag' => '# S A R A S',
            'title' => 'Curated <br>Living Spaces',
            'button_text' => 'Discover Now',
            'button_link' => '#',
            'gradient' => 'linear-gradient(105deg,rgba(250,246,241,0.6) 0%,rgba(250,246,241,0.1) 60%)'
        ],
    ];
@endphp
@php
    $marqueeItems = [
        'New Arrivals',
        'Free Shipping Over $150',
        'Handcrafted Furniture',
        'SS25 Collection',
        'Sustainable Materials',
        'New Arrivals',
        'Free Shipping Over $150',
        'Handcrafted Furniture',
        'SS25 Collection',
        'Sustainable Materials',
    ];
@endphp
<div id="cursorDot"
     class="fixed top-0 left-0 w-2 h-2 bg-rouge rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2 transition-transform duration-100 ease-in-out"></div>
<div id="cursorRing"
     class="cursor-ring fixed top-0 left-0 w-9 h-9 border border-charcoal rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2 opacity-60 transition-all duration-[180ms] ease-in-out"></div>

<nav class="absolute top-0 left-0 right-0 z-[200] px-6 lg:px-[60px] py-6">
    <div class="flex items-center justify-between">

        <a href="#" class="font-cormorant text-[1.8rem] font-bold tracking-[-0.02em] text-charcoal no-underline">
            Sara's<span class="text-rouge">.</span>
        </a>

        <ul class="hidden lg:flex gap-11 list-none items-center">
            <li><a href="#" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Home</a></li>
            <li><a href="#" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Shop</a></li>
            <li><a href="#" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Blogs</a></li>
            <li><a href="#" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">About Us</a></li>
            <li><a href="#" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Contact</a></li>
        </ul>

        <div class="flex items-center gap-3">
            <a href="#" class="w-[38px] h-[38px] border border-charcoal/20 rounded-full flex items-center justify-center text-charcoal text-[0.7rem] transition-all duration-[250ms] hover:bg-charcoal hover:text-white hover:border-charcoal">
                <i class="fas fa-search"></i>
            </a>
            <a href="#" class="relative w-[38px] h-[38px] border border-charcoal/20 rounded-full flex items-center justify-center text-charcoal text-[0.7rem] transition-all duration-[250ms] hover:bg-charcoal hover:text-white hover:border-charcoal">
                <i class="fas fa-shopping-bag"></i>
                <span class="absolute -top-1 -right-1 w-4 h-4 bg-rouge text-white text-[9px] font-bold flex items-center justify-center rounded-full">0</span>
            </a>
            <button id="menuToggle" class="lg:hidden w-[38px] h-[38px] border border-charcoal/20 rounded-full flex items-center justify-center text-charcoal text-[0.75rem] transition-all duration-[250ms] hover:bg-charcoal hover:text-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <div id="mobileMenu" style="display:none"
         class="bg-white/95 backdrop-blur-sm px-2 pb-4 mt-4 rounded-lg shadow-xl border-t border-charcoal/[0.08]">
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Home</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Shop</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Blogs</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">About Us</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Contact</a>
    </div>
</nav>
<div class="relative">
    <div class="hero-owl owl-carousel owl-theme">
        @foreach($slides as $slide)
            <div class="item relative">
                <div class="relative flex items-center overflow-hidden h-screen min-h-[620px]">
                    <div class="absolute inset-0 bg-cover bg-center"
                         style="background-image:url('{{ $slide['image'] }}')">
                        <div class="absolute inset-0" style="background:{{ $slide['gradient'] }}"></div>
                    </div>
                    <div class="relative z-10 ml-auto w-full max-w-[620px] px-8 py-12 lg:pr-[80px] lg:pl-[40px]"
                         style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">
                        <div class="slide-tag inline-block border border-charcoal/50 text-[0.55rem] tracking-ultra font-bold px-4 py-[6px] uppercase text-charcoal mb-5">
                            {!! $slide['tag'] !!}
                        </div>
                        <h1 class="slide-title font-cormorant font-bold italic leading-none uppercase text-charcoal mb-10"
                            style="font-size:clamp(3.2rem,6vw,5.8rem)">
                            {!! $slide['title'] !!}
                        </h1>
                        <div class="slide-btn-wrap">
                            <a href="{{ $slide['button_link'] }}" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[42px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal bg-white/25 backdrop-blur-md overflow-hidden transition-colors duration-[350ms] no-underline">
                                <span class="relative z-[1]">{!! $slide['button_text'] !!}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="slideCounter"
         class="slide-counter writing-vertical absolute bottom-[90px] right-[10px] md:bottom-[100px] md:right-5 z-[300] text-[0.6rem] font-bold tracking-wide-5 text-charcoal">
        01 / 03
    </div>
    <div id="slideProgress"
         class="absolute bottom-0 left-0 h-[3px] bg-rouge w-0 z-[400] transition-none"></div>
    <div class="carousel-nav absolute bottom-0 right-0 z-[300] flex">
        <button id="prevSlide"
                class="carousel-nav-btn nav-prev relative w-[72px] h-[72px] md:w-[88px] md:h-[88px] flex items-center justify-center cursor-none font-extrabold text-base tracking-[0.1em] overflow-hidden transition-all duration-300 bg-cream border-r border-charcoal/[0.12] text-charcoal hover:text-charcoal"
                aria-label="Previous slide">
            <span class="relative z-[1] flex items-center gap-[6px] text-[0.65rem] font-extrabold tracking-wide-6 uppercase">
                <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.5 5H1.5M1.5 5L6 1M1.5 5L6 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="hidden md:inline">PREV</span>
            </span>
        </button>

        <button id="nextSlide"
                class="carousel-nav-btn nav-next relative w-[72px] h-[72px] md:w-[88px] md:h-[88px] flex items-center justify-center cursor-none font-extrabold text-base tracking-[0.1em] overflow-hidden transition-all duration-300 bg-charcoal text-white hover:text-white"
                aria-label="Next slide">
            <span class="relative z-[1] flex items-center gap-[6px] text-[0.65rem] font-extrabold tracking-wide-6 uppercase">
                <span class="hidden md:inline">NEXT</span>
                <svg width="22" height="10" viewBox="0 0 22 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 5H20.5M20.5 5L16 1M20.5 5L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
        </button>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-[300] flex flex-col items-center gap-2">
        <span class="text-[0.52rem] font-bold tracking-wide-3 uppercase text-charcoal opacity-60">Scroll</span>
        <div class="scroll-line w-px h-10 bg-gradient-to-b from-charcoal to-transparent"></div>
    </div>
</div>
<div class="reveal overflow-hidden whitespace-nowrap bg-charcoal text-cream py-3">
    <div class="marquee-inner inline-block">
        @foreach($marqueeItems as $item)
            <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">
            {{ $item }}<span class="text-rouge"> ✦ </span>
        </span>
        @endforeach
    </div>
</div>
<section class="bg-warm-white">
    <div class="flex flex-wrap">

        <!-- Left 3/4 -->
        <div class="w-full lg:w-3/4 flex-none">
            <div class="flex flex-wrap">

                <!-- Big left banner -->
                <div class="banner-card reveal-left relative overflow-hidden cursor-none w-full h-[380px]" data-md-width="66.666%">
                    <div class="bg-img" style="background-image:url('https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/banner-01.jpg')"></div>
                    <div class="banner-overlay"></div>
                    <div class="absolute inset-0 flex items-center p-8 z-10">
                        <div>
                            <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">AW 2025</p>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">New Collection<br/>A-W SS17</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>

                <!-- Small right banner -->
                <div class="banner-card reveal relative overflow-hidden cursor-none w-full h-[380px] bg-[#F5EDE6]" data-md-width="33.333%">
                    <div class="bg-img" style="background-image:url('https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?w=600&q=80')"></div>
                    <div class="banner-overlay" style="background:linear-gradient(135deg,rgba(245,237,230,0.9) 0%,rgba(245,237,230,0.2) 100%)"></div>
                    <div class="absolute inset-0 flex items-center p-8 z-10">
                        <div>
                            <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">Decor</p>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Wooden<br/>Birds Decor</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>

                <!-- Bottom left small -->
                <div class="banner-card reveal relative overflow-hidden cursor-none w-full h-[380px]" data-md-width="33.333%">
                    <div class="bg-img" style="background-image:url('https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/banner-04.jpg')"></div>
                    <div class="banner-overlay"></div>
                    <div class="absolute inset-0 flex items-end justify-end p-8 z-10">
                        <div class="text-left">
                            <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">Sale</p>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Summer Sales<br/>Up to 50%</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>

                <!-- Bottom right big -->
                <div class="banner-card reveal-right relative overflow-hidden cursor-none w-full h-[380px]" data-md-width="66.666%">
                    <div class="bg-img" style="background-image:url('https://i.etsystatic.com/23115628/r/il/ff89b2/3439364127/il_1588xN.3439364127_ne05.jpg')"></div>
                    <div class="banner-overlay" style="background:linear-gradient(135deg,rgba(250,246,241,0.7) 0%,rgba(250,246,241,0.1) 100%)"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-center p-8 z-10">
                        <div>
                            <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">Lighting</p>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 tracking-wide-2" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Pendant<br/>Lamp</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right 1/4 tall -->
        <div class="banner-card reveal-right relative overflow-hidden cursor-none w-full h-[500px] flex-none" data-lg="true">
            <div class="bg-img" style="background-image:url('https://thejonesyco.com/cdn/shop/files/00000PORTRAIT_00000_BURST20200401104154557-01_1.jpg?v=1683036092&width=1946')"></div>
            <div class="banner-overlay" style="background:linear-gradient(160deg,rgba(250,246,241,0.8) 0%,rgba(250,246,241,0.15) 100%)"></div>
            <div class="absolute inset-0 flex items-start justify-center text-center pt-10 z-10">
                <div>
                    <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">Textile</p>
                    <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 text-[2rem]">Macrame<br/>Collection</h3>
                    <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="bg-cream border-t border-charcoal/[0.07] border-b border-charcoal/[0.07]">
    <div class="max-w-[1200px] mx-auto px-8 py-16 grid gap-12 text-center"
         style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">

        <div class="reveal delay-[100ms]">
            <div class="text-[1.4rem] mb-3 text-rouge"><i class="fas fa-truck"></i></div>
            <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase mb-1">Free Shipping</p>
            <p class="text-[0.75rem] text-gray-400 font-normal">On orders over $150</p>
        </div>
        <div class="reveal delay-[200ms]">
            <div class="text-[1.4rem] mb-3 text-rouge"><i class="fas fa-recycle"></i></div>
            <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase mb-1">Sustainable</p>
            <p class="text-[0.75rem] text-gray-400 font-normal">Ethically sourced materials</p>
        </div>
        <div class="reveal delay-[300ms]">
            <div class="text-[1.4rem] mb-3 text-rouge"><i class="fas fa-undo"></i></div>
            <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase mb-1">Easy Returns</p>
            <p class="text-[0.75rem] text-gray-400 font-normal">30 day return policy</p>
        </div>
        <div class="reveal delay-[450ms]">
            <div class="text-[1.4rem] mb-3 text-rouge"><i class="fas fa-headset"></i></div>
            <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase mb-1">24/7 Support</p>
            <p class="text-[0.75rem] text-gray-400 font-normal">We're always here to help</p>
        </div>

    </div>
</section>

<section class="bg-warm-white py-24 px-6 lg:px-[60px]">
    <div class="heading-wrap reveal mb-14 flex flex-col items-center text-center gap-3">
        <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge">Our Selection</p>
        <h2 class="font-cormorant font-bold italic text-charcoal leading-none"
            style="font-size:clamp(2.4rem,4vw,3.8rem)">Featured Products</h2>
        <div class="section-heading-line h-px bg-sand mt-1"></div>
    </div>

    <!-- Tab triggers -->
    <div class="flex justify-center mb-14">
        <div class="flex gap-10 md:gap-20 flex-wrap justify-center">
            <button onclick="switchProductTab('new')" id="ptab-new"
                    class="tab-trigger active font-cormorant font-semibold"
                    style="font-size:clamp(1.4rem,2.5vw,2rem)">New Arrivals</button>
            <button onclick="switchProductTab('best')" id="ptab-best"
                    class="tab-trigger font-cormorant font-semibold"
                    style="font-size:clamp(1.4rem,2.5vw,2rem)">Best Sellers</button>
            <button onclick="switchProductTab('sale')" id="ptab-sale"
                    class="tab-trigger font-cormorant font-semibold"
                    style="font-size:clamp(1.4rem,2.5vw,2rem)">Items Sale</button>
        </div>
    </div>

    @php
        $products = [
            [
                'primary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg',
                'secondary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg',
                'title' => 'Three Seat Sofa',
                'subtitle' => 'Three Seat Sofa',
                'price' => '$230.00',
                'label' => 'Hot',
                'label_bg' => 'bg-rouge',
                'delay' => 0
            ],
            [
                'primary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg',
                'secondary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg',
                'title' => 'Accent Chair',
                'subtitle' => 'Accent Chair',
                'price' => '$185.00',
                'label' => 'New',
                'label_bg' => 'bg-charcoal',
                'delay' => 60
            ],
            [
                'primary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg',
                'secondary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg',
                'title' => 'Coffee Table',
                'subtitle' => 'Coffee Table',
                'price' => '$320.00',
                'label' => null,
                'label_bg' => null,
                'delay' => 120
            ],
            [
                'primary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg',
                'secondary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg',
                'title' => 'Pendant Lamp',
                'subtitle' => 'Pendant Lamp',
                'price' => '$145.00',
                'price_old' => '$195.00',
                'label' => 'Sale',
                'label_bg' => 'bg-sand',
                'delay' => 180
            ],
               [
                'primary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg',
                'secondary' => 'https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg',
                'title' => 'Pendant Lamp',
                'subtitle' => 'Pendant Lamp',
                'price' => '$145.00',
                'price_old' => '$195.00',
                'label' => 'Sale',
                'label_bg' => 'bg-sand',
                'delay' => 180
            ],

        ];
    @endphp

{{--    <div id="panel-new" class="tab-panel active grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">--}}
{{--        @foreach($products as $product)--}}
{{--            <div class="product-card-wrap group cursor-none" style="transition-delay:{{ $product['delay'] }}ms">--}}
{{--                <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                    <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                         src="{{ $product['primary'] }}" alt="{{ $product['subtitle'] }}"/>--}}
{{--                    <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                         src="{{ $product['secondary'] }}" alt="{{ $product['subtitle'] }} alt"/>--}}
{{--                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                    </div>--}}

{{--                    @if($product['label'])--}}
{{--                        <span class="absolute top-3 left-0 {{ $product['label_bg'] }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">{{ $product['label'] }}</span>--}}
{{--                    @endif--}}

{{--                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="text-center">--}}
{{--                    <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product['title'] }}</h4>--}}
{{--                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">--}}
{{--                        {{ $product['price'] }}--}}
{{--                        @isset($product['price_old'])--}}
{{--                            <span class="line-through text-gray-300 text-[0.85rem]">{{ $product['price_old'] }}</span>--}}
{{--                        @endisset--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--    <div id="panel-best" class="tab-panel grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:0ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Sofa 2"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Sofa 2 alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-rouge text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">Hot</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Oslo Sofa</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$890.00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:60ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Lounge Chair"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Lounge Chair alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Lounge Chair</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$540.00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:120ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Side Table"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Side Table alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Side Table</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$210.00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:180ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Bookcase"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Bookcase alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-charcoal text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">Top</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Oak Bookcase</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$680.00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:240ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Throw"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Throw alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Knit Throw</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$88.00</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- ── ITEMS SALE panel ── -->--}}
{{--    <div id="panel-sale" class="tab-panel grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:0ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Sofa Sale"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Sofa Sale alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-rouge text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">-30%</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Corner Sofa</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$630.00 <span class="line-through text-gray-300 text-[0.85rem]">$900.00</span></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:60ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Dining Chair"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Dining Chair alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-sand text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">Sale</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Dining Chair</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$110.00 <span class="line-through text-gray-300 text-[0.85rem]">$155.00</span></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:120ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Floor Lamp"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Floor Lamp alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-rouge text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">-50%</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Floor Lamp</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$95.00 <span class="line-through text-gray-300 text-[0.85rem]">$190.00</span></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:180ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Planter"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Planter alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-sand text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">Sale</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Terracotta Planter</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$28.00 <span class="line-through text-gray-300 text-[0.85rem]">$45.00</span></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="product-card-wrap group cursor-none" style="transition-delay:240ms">--}}
{{--            <div class="relative overflow-hidden bg-cream mb-4" style="padding-bottom:125%">--}}
{{--                <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-43-min-405x510.jpg" alt="Console"/>--}}
{{--                <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"--}}
{{--                     src="https://themes.g5plus.net/april-furniture/wp-content/uploads/2017/10/product-26-min-405x510.jpg" alt="Console alt"/>--}}
{{--                <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300" style="background:rgba(30,30,30,0.08)">--}}
{{--                    <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-none">Add to Cart</button>--}}
{{--                </div>--}}
{{--                <span class="absolute top-3 left-0 bg-rouge text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">-20%</span>--}}
{{--                <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-none" onclick="toggleWish(this)">--}}
{{--                    <i class="fa-regular fa-heart text-gray-400 text-lg"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="text-center">--}}
{{--                <h4 class="font-raleway text-[0.7rem] tracking-wide-4 uppercase text-gray-400 mb-1">Console Table</h4>--}}
{{--                <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">$360.00 <span class="line-through text-gray-300 text-[0.85rem]">$450.00</span></p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

    <!-- View all CTA -->
    <div class="flex justify-center mt-14 reveal">
        <a href="#" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[52px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal overflow-hidden transition-colors duration-[350ms] no-underline">
            <span class="relative z-[1]">View All Products</span>
        </a>
    </div>

</section>

<script>
    $(function () {
        /* ── Custom Cursor ── */
        const dot  = document.getElementById('cursorDot');
        const ring = document.getElementById('cursorRing');
        let ringX = 0, ringY = 0, dotX = 0, dotY = 0;
        let mouseX = 0, mouseY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX; mouseY = e.clientY;
            dotX += (mouseX - dotX) * 0.5;
            dotY += (mouseY - dotY) * 0.5;
            dot.style.left = dotX + 'px';
            dot.style.top  = dotY + 'px';
        });

        (function animateRing() {
            ringX += (mouseX - ringX) * 0.1;
            ringY += (mouseY - ringY) * 0.1;
            ring.style.left = ringX + 'px';
            ring.style.top  = ringY + 'px';
            requestAnimationFrame(animateRing);
        })();

        /* ── Owl Carousel ── */
        const totalSlides = 3;
        let progressRAF;

        const owl = $('.hero-owl').owlCarousel({
            loop: true, items: 1,
            autoplay: true, autoplayTimeout: 4500, autoplayHoverPause: true,
            smartSpeed: 1000, animateOut: 'fadeOut', animateIn: 'fadeIn',
            nav: false, dots: false
        });

        function startProgress(duration) {
            let start = null;
            const bar = document.getElementById('slideProgress');
            bar.style.width = '0%';
            cancelAnimationFrame(progressRAF);
            function tick(ts) {
                if (!start) start = ts;
                const pct = Math.min(((ts - start) / duration) * 100, 100);
                bar.style.width = pct + '%';
                if (pct < 100) progressRAF = requestAnimationFrame(tick);
            }
            progressRAF = requestAnimationFrame(tick);
        }

        owl.on('changed.owl.carousel', function(e) {
            const num = String(((e.item.index - 1) % totalSlides) + 1).padStart(2, '0');
            document.getElementById('slideCounter').textContent = num + ' / 0' + totalSlides;
            startProgress(4500);
        });

        startProgress(4500);
        $('#prevSlide').click(() => owl.trigger('prev.owl.carousel'));
        $('#nextSlide').click(() => owl.trigger('next.owl.carousel'));

        /* ── Mobile Menu ── */
        $('#menuToggle').click(() => $('#mobileMenu').slideToggle(280));

        /* ── Scroll Reveal ── */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

        document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale')
            .forEach(el => observer.observe(el));

        /* ── Responsive banner widths ── */
        function applyResponsive() {
            const isMd = window.innerWidth >= 768;
            document.querySelectorAll('[data-md-width]').forEach(el => {
                el.style.width = isMd ? el.dataset.mdWidth : '100%';
            });
        }
        applyResponsive();
        window.addEventListener('resize', applyResponsive);
    });
</script>

<script>
    /* ── Product Tab Switcher ── */
    function switchProductTab(tab) {
        // Update trigger styles
        document.querySelectorAll('.tab-trigger').forEach(btn => btn.classList.remove('active'));
        document.getElementById('ptab-' + tab).classList.add('active');

        // Hide current panel
        const current = document.querySelector('.tab-panel.active');
        if (current) {
            current.classList.remove('fade-in');
            setTimeout(() => {
                current.classList.remove('active');
                showPanel(tab);
            }, 200);
        } else {
            showPanel(tab);
        }
    }

    function showPanel(tab) {
        const panel = document.getElementById('panel-' + tab);
        panel.classList.add('active');
        // Trigger reflow then fade in
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                panel.classList.add('fade-in');
                // Re-run stagger animation for cards
                panel.querySelectorAll('.product-card-wrap').forEach((card, i) => {
                    card.classList.remove('visible');
                    card.style.transitionDelay = (i * 60) + 'ms';
                    setTimeout(() => card.classList.add('visible'), 50 + i * 60);
                });
            });
        });
    }

    /* ── Wishlist toggle ── */
    function toggleWish(btn) {
        btn.classList.toggle('wishlisted');
        const icon = btn.querySelector('i');
        if (btn.classList.contains('wishlisted')) {
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid');
            icon.style.color = 'var(--rouge)';
        } else {
            icon.classList.remove('fa-solid');
            icon.classList.add('fa-regular');
            icon.style.color = '';
        }
    }

    /* ── Scroll reveal for product cards (initial load) ── */
    $(function () {
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

        // Only observe active panel cards on load
        document.querySelectorAll('#panel-new .product-card-wrap').forEach(el => cardObserver.observe(el));

        // Heading line observer
        const headingObs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    headingObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.heading-wrap').forEach(el => headingObs.observe(el));

        // Initial active panel fade-in
        const initialPanel = document.querySelector('.tab-panel.active');
        if (initialPanel) {
            requestAnimationFrame(() => requestAnimationFrame(() => initialPanel.classList.add('fade-in')));
        }
    });
</script>
</body>
</html>
