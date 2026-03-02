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
            --sand: #C9B49A;
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

        .slide-tag { opacity:0; transform:translateY(20px); transition:all 0.6s ease 0.3s; }
        .slide-title { opacity:0; transform:translateY(30px); transition:all 0.7s cubic-bezier(0.4,0,0.2,1) 0.5s; }
        .slide-btn-wrap { opacity:0; transform:translateY(20px); transition:all 0.6s ease 0.75s; }
        .owl-item.active .slide-tag,
        .owl-item.active .slide-title,
        .owl-item.active .slide-btn-wrap { opacity:1; transform:translateY(0); }

        .shop-btn::before {
            content:''; position:absolute; inset:0;
            background:#1e1e1e; transform:scaleX(0); transform-origin:left;
            transition:transform 0.35s cubic-bezier(0.4,0,0.2,1); z-index:0;
        }
        .shop-btn:hover::before { transform:scaleX(1); }
        .shop-btn:hover { color:white; }

        .carousel-nav-btn::before { content:''; position:absolute; inset:0; transform:scaleY(0); transform-origin:bottom; transition:transform 0.3s cubic-bezier(0.4,0,0.2,1); }
        .carousel-nav-btn:hover::before { transform:scaleY(1); }
        .nav-prev::before { background:var(--blush); }
        .nav-next::before { background:var(--rouge); }

        .banner-card .bg-img { position:absolute; inset:0; background-size:cover; background-position:center; transform:scale(1.08); transition:transform 0.7s cubic-bezier(0.4,0,0.2,1); }
        .banner-card:hover .bg-img { transform:scale(1.0); }

        .banner-link::after { content:''; position:absolute; bottom:0; left:0; width:100%; height:1.5px; background:#1e1e1e; transform-origin:right; transition:transform 0.35s ease; }
        .banner-card:hover .banner-link::after { transform:scaleX(0); transform-origin:left; }
        .banner-link::before { content:''; position:absolute; bottom:0; left:0; width:100%; height:1.5px; background:var(--rouge); transform:scaleX(0); transform-origin:left; transition:transform 0.35s ease 0.2s; }
        .banner-card:hover .banner-link::before { transform:scaleX(1); }

        .reveal        { opacity:0; transform:translateY(48px);  transition:opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-left   { opacity:0; transform:translateX(-48px); transition:opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-right  { opacity:0; transform:translateX(48px);  transition:opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal-scale  { opacity:0; transform:scale(0.92);       transition:opacity 0.8s cubic-bezier(0.4,0,0.2,1), transform 0.8s cubic-bezier(0.4,0,0.2,1); }
        .reveal.visible, .reveal-left.visible, .reveal-right.visible, .reveal-scale.visible { opacity:1; transform:none; }

        @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
        .marquee-inner { animation:marquee 18s linear infinite; }

        @keyframes scrollPulse { 0%,100%{opacity:0.5;transform:scaleY(1)} 50%{opacity:1;transform:scaleY(0.7)} }
        .scroll-line { animation:scrollPulse 2s ease-in-out infinite; }

        .writing-vertical { writing-mode:vertical-rl; }

        #mobileMenu a { display:block; border-bottom:1px solid rgba(30,30,30,0.06); transition:color 0.2s, padding-left 0.2s; }
        #mobileMenu a:hover { color:var(--rouge); padding-left:8px; }

        /* ── Tab styles ── */
        .tab-trigger {
            position:relative; padding-bottom:6px;
            color:#C0B5AA; transition:color 0.3s ease;
            background:transparent; border:none; cursor:pointer; outline:none;
        }
        .tab-trigger::after {
            content:''; position:absolute; bottom:0; left:0;
            width:0; height:2px; background:var(--charcoal);
            transition:width 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .tab-trigger.active { color:var(--charcoal); }
        .tab-trigger.active::after { width:100%; }
        .tab-trigger:not(.active):hover { color:#888; }
        .tab-trigger:not(.active):hover::after { width:40%; background:var(--rouge); }

        /* ── Product card ── */
        .product-card-wrap { opacity:0; transform:translateY(28px); transition:opacity 0.55s cubic-bezier(0.4,0,0.2,1), transform 0.55s cubic-bezier(0.4,0,0.2,1); }
        .product-card-wrap.visible { opacity:1; transform:translateY(0); }
        .product-card-wrap:hover .product-img-primary   { opacity:0; }
        .product-card-wrap:hover .product-img-secondary { opacity:1; }
        .product-card-wrap:hover .product-overlay       { opacity:1; }
        .add-cart-btn { transform:translateY(8px); transition:transform 0.3s ease, background-color 0.25s ease, color 0.25s ease; }
        .product-card-wrap:hover .add-cart-btn { transform:translateY(0); }
        .wish-btn { transition:transform 0.2s ease, color 0.2s ease; }
        .wish-btn:hover { transform:scale(1.25); color:var(--rouge) !important; }

        /* ── Tab panels ── */
        .tab-panel { display:none; opacity:0; transform:translateY(16px); transition:opacity 0.45s ease, transform 0.45s cubic-bezier(0.4,0,0.2,1); }
        .tab-panel.active { display:grid; }
        .tab-panel.fade-in { opacity:1; transform:translateY(0); }

        /* ── Section heading line ── */
        .section-heading-line { width:0; transition:width 0.9s cubic-bezier(0.4,0,0.2,1) 0.4s; }
        .heading-wrap.visible .section-heading-line { width:60px; }

        /* ── Responsive product grid ── */
        .products-grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(2, 1fr);
        }
        @media (min-width: 480px) { .products-grid { grid-template-columns: repeat(2, 1fr); gap: 1.25rem; } }
        @media (min-width: 640px) { .products-grid { grid-template-columns: repeat(3, 1fr); gap: 1.5rem; } }
        @media (min-width: 900px) { .products-grid { grid-template-columns: repeat(4, 1fr); gap: 1.5rem; } }
        @media (min-width: 1200px) { .products-grid { grid-template-columns: repeat(5, 1fr); gap: 1.75rem; } }

        /* ── Footer animations ── */
        @keyframes footerLineGrow { from{width:0} to{width:100%} }
        @keyframes fadeSlideUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
        @keyframes pulse-rouge { 0%,100%{box-shadow:0 0 0 0 rgba(217,79,79,0.4)} 50%{box-shadow:0 0 0 8px rgba(217,79,79,0)} }

        .footer-section { opacity:0; transform:translateY(30px); transition:opacity 0.7s ease, transform 0.7s ease; }
        .footer-section.footer-visible { opacity:1; transform:translateY(0); }

        .footer-social-btn {
            width:40px; height:40px; border-radius:50%;
            display:flex; align-items:center; justify-content:center;
            border:1.5px solid rgba(250,246,241,0.2);
            color:rgba(250,246,241,0.5);
            transition:all 0.35s cubic-bezier(0.4,0,0.2,1);
            text-decoration:none; font-size:0.8rem;
            position:relative; overflow:hidden;
        }
        .footer-social-btn::before {
            content:''; position:absolute; inset:0; border-radius:50%;
            background:var(--rouge); transform:scale(0);
            transition:transform 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .footer-social-btn:hover::before { transform:scale(1); }
        .footer-social-btn:hover { color:#fff; border-color:var(--rouge); }
        .footer-social-btn i { position:relative; z-index:1; }

        .footer-link {
            color:rgba(250,246,241,0.45); font-size:0.6rem; font-weight:700;
            letter-spacing:0.2em; text-transform:uppercase; text-decoration:none;
            position:relative; padding-bottom:3px; display:inline-block;
            transition:color 0.3s ease;
        }
        .footer-link::after {
            content:''; position:absolute; bottom:0; left:0; width:0; height:1.5px;
            background:var(--rouge); transition:width 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .footer-link:hover { color:rgba(250,246,241,0.9); }
        .footer-link:hover::after { width:100%; }

        .newsletter-input {
            background:rgba(250,246,241,0.06); border:1.5px solid rgba(250,246,241,0.15);
            color:#FAF6F1; outline:none; transition:border-color 0.3s ease, background 0.3s ease;
        }
        .newsletter-input::placeholder { color:rgba(250,246,241,0.3); }
        .newsletter-input:focus { border-color:var(--rouge); background:rgba(250,246,241,0.1); }

        .footer-divider {
            height:1px; width:0;
            background:linear-gradient(90deg, transparent, rgba(250,246,241,0.15), transparent);
            transition:width 1.2s cubic-bezier(0.4,0,0.2,1) 0.3s;
        }
        .footer-divider.footer-visible { width:100%; }

        @keyframes floatDot { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        .footer-dot { animation:floatDot 3s ease-in-out infinite; }
        .footer-dot:nth-child(2) { animation-delay:0.5s; }
        .footer-dot:nth-child(3) { animation-delay:1s; }

        /* ── Back to top ── */
        #backToTop { transition:all 0.3s ease; }
        #backToTop:hover { background:var(--rouge); transform:translateY(-3px); }

        @media (min-width: 768px) {
            [data-md-width="66.666%"] { width:66.666% !important; }
            [data-md-width="33.333%"] { width:33.333% !important; }
        }
        @media (min-width: 1024px) {
            [data-lg="true"] { height:760px !important; flex:1 !important; }
        }
        /* Hide ALL panels by default — no exceptions */
        .tab-panel {
            display: none !important;
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.45s ease, transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Only the active panel becomes a grid */
        .tab-panel.active {
            display: grid !important;
        }

        /* fade-in state (added one rAF after .active) */
        .tab-panel.fade-in {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="font-raleway bg-warm-white overflow-x-hidden">

<!-- ═══════════════════ NAV ═══════════════════ -->
<nav class="absolute top-0 left-0 right-0 z-[200] px-6 lg:px-[60px] py-6" style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">
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
    <div id="mobileMenu" style="display:none" class="bg-white/95 backdrop-blur-sm px-2 pb-4 mt-4 rounded-lg shadow-xl border-t border-charcoal/[0.08]">
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Home</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Shop</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Blogs</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">About Us</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Contact</a>
    </div>
</nav>

<!-- ═══════════════════ HERO SLIDER ═══════════════════ -->
<div class="relative">
    <div class="hero-owl owl-carousel owl-theme">
        <!-- Slide 1 -->
        <div class="item relative">
            <div class="relative flex items-center overflow-hidden h-screen min-h-[620px]">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ asset('img/slider1.jpg') }}')">
                    <div class="absolute inset-0" style="background:linear-gradient(105deg,rgba(250,246,241,0.6) 0%,rgba(250,246,241,0.12) 60%)"></div>
                </div>
                <div class="relative z-10 ml-auto w-full max-w-[620px] px-8 py-12 lg:pr-[80px] lg:pl-[40px]" style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">
                    <div class="slide-tag inline-block border border-charcoal/50 text-[0.55rem] tracking-ultra font-bold px-4 py-[6px] uppercase text-charcoal mb-5"># S A R A S - C R E A T I O N S</div>
                    <h1 class="slide-title font-cormorant font-bold italic leading-none uppercase text-charcoal mb-10" style="font-size:clamp(3.2rem,6vw,5.8rem)">Elegant<br>Macrame Decor</h1>
                    <div class="slide-btn-wrap">
                        <a href="#" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[42px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal bg-white/25 backdrop-blur-md overflow-hidden transition-colors duration-[350ms] no-underline">
                            <span class="relative z-[1]">Explore Collection</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="item relative">
            <div class="relative flex items-center overflow-hidden h-screen min-h-[620px]">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('{{ asset('img/slider-2.jpg') }}')">
                    <div class="absolute inset-0" style="background:linear-gradient(105deg,rgba(250,246,241,0.6) 0%,rgba(250,246,241,0.1) 60%)"></div>
                </div>
                <div class="relative z-10 ml-auto w-full max-w-[620px] px-8 py-12 lg:pr-[80px] lg:pl-[40px]" style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">
                    <div class="slide-tag inline-block border border-charcoal/50 text-[0.55rem] tracking-ultra font-bold px-4 py-[6px] uppercase text-charcoal mb-5"># S A R A S - C R E A T I O N S</div>
                    <h1 class="slide-title font-cormorant font-bold italic leading-none uppercase text-charcoal mb-10" style="font-size:clamp(3.2rem,6vw,5.8rem)">Premium<br>Cotton Macrame</h1>
                    <div class="slide-btn-wrap">
                        <a href="#" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[42px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal bg-white/25 backdrop-blur-md overflow-hidden transition-colors duration-[350ms] no-underline">
                            <span class="relative z-[1]">Discover Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="slideCounter" class="writing-vertical absolute bottom-[90px] right-[10px] md:bottom-[100px] md:right-5 z-[300] text-[0.6rem] font-bold tracking-wide-5 text-charcoal">01 / 02</div>
    <div id="slideProgress" class="absolute bottom-0 left-0 h-[3px] bg-rouge w-0 z-[400] transition-none"></div>
    <div class="carousel-nav absolute bottom-0 right-0 z-[300] flex">
        <button id="prevSlide" class="carousel-nav-btn nav-prev relative w-[72px] h-[72px] md:w-[88px] md:h-[88px] flex items-center justify-center font-extrabold text-base tracking-[0.1em] overflow-hidden transition-all duration-300 bg-cream border-r border-charcoal/[0.12] text-charcoal hover:text-charcoal" aria-label="Previous slide">
            <span class="relative z-[1] flex items-center gap-[6px] text-[0.65rem] font-extrabold tracking-wide-6 uppercase">
                <svg width="22" height="10" viewBox="0 0 22 10" fill="none"><path d="M20.5 5H1.5M1.5 5L6 1M1.5 5L6 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="hidden md:inline">PREV</span>
            </span>
        </button>
        <button id="nextSlide" class="carousel-nav-btn nav-next relative w-[72px] h-[72px] md:w-[88px] md:h-[88px] flex items-center justify-center font-extrabold text-base tracking-[0.1em] overflow-hidden transition-all duration-300 bg-charcoal text-white hover:text-white" aria-label="Next slide">
            <span class="relative z-[1] flex items-center gap-[6px] text-[0.65rem] font-extrabold tracking-wide-6 uppercase">
                <span class="hidden md:inline">NEXT</span>
                <svg width="22" height="10" viewBox="0 0 22 10" fill="none"><path d="M1.5 5H20.5M20.5 5L16 1M20.5 5L16 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
        </button>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-[300] flex flex-col items-center gap-2">
        <span class="text-[0.52rem] font-bold tracking-wide-3 uppercase text-charcoal opacity-60">Scroll</span>
        <div class="scroll-line w-px h-10 bg-gradient-to-b from-charcoal to-transparent"></div>
    </div>
</div>

<!-- ═══════════════════ MARQUEE ═══════════════════ -->
<div class="reveal overflow-hidden whitespace-nowrap bg-charcoal text-cream py-3">
    <div class="marquee-inner inline-block">
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">New Collection<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Trusted Shipping<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Handycraft<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">2026 Collection<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Sustainable Materials<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">New Collection<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Trusted Shipping<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Handycraft<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">2026 Collection<span class="text-rouge"> ✦ </span></span>
        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">Sustainable Materials<span class="text-rouge"> ✦ </span></span>
    </div>
</div>

<!-- ═══════════════════ BANNER GRID ═══════════════════ -->
<section class="bg-warm-white">
    <div class="flex flex-wrap">
        <div class="w-full lg:w-3/4 flex-none">
            <div class="flex flex-wrap">
                <div class="banner-card reveal-left relative overflow-hidden w-full h-[380px]" data-md-width="66.666%">
                    <div class="bg-img" style="background-image:url('{{ asset('img/cotton-cord.jpg') }}')"></div>
                    <div class="absolute inset-0 flex items-start p-8 z-10">
                        <div>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Macrame<br/>Twisted Cotton Cord</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="banner-card reveal relative overflow-hidden w-full h-[380px] bg-[#F5EDE6]" data-md-width="33.333%">
                    <div class="bg-img" style="background-image:url('{{ asset('img/banner-img2.avif') }}')"></div>
                    <div class="absolute inset-0 flex items-center p-8 z-10">
                        <div>
                            <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">Decor</p>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Macrame<br/>Wooden Decor</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="banner-card reveal relative overflow-hidden w-full h-[380px]" data-md-width="33.333%">
                    <div class="bg-img" style="background-image:url('{{ asset('img/banner-img5.webp') }}')"></div>
                    <div class="absolute inset-0 flex items-end justify-end p-8 z-10">
                        <div class="text-left">
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="banner-card reveal-right relative overflow-hidden w-full h-[380px]" data-md-width="66.666%">
                    <div class="bg-img" style="background-image:url('{{ asset('img/banner-img-9.png') }}')"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-center p-8 z-10">
                        <div>
                            <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 tracking-wide-2" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">Macrame<br/>Planters</h3>
                            <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-card reveal-right relative overflow-hidden w-full h-[500px] flex-none" data-lg="true">
            <div class="bg-img" style="background-image:url('{{ asset('img/banner-img1.webp') }}')"></div>
            <div class="absolute inset-0 flex items-start justify-center text-center pt-10 z-10">
                <div>
                    <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 text-[2rem]">Macrame<br/>Collection</h3>
                    <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════ FEATURES BAR ═══════════════════ -->
<section class="bg-cream border-t border-charcoal/[0.07] border-b border-charcoal/[0.07]">
    <div class="max-w-[1200px] mx-auto px-8 py-16 grid gap-12 text-center" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
        <div class="reveal delay-[100ms]">
            <div class="text-[1.4rem] mb-3 text-rouge"><i class="fas fa-truck"></i></div>
            <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase mb-1">Trusted Shipping</p>
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

<!-- ═══════════════════ FEATURED PRODUCTS ═══════════════════ -->
@php

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

@endphp
<section class="bg-warm-white py-16 px-4 sm:px-6 lg:px-[60px]">
    <div class="heading-wrap reveal mb-10 sm:mb-14 flex flex-col items-center text-center gap-3">
        <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge">Our Selection</p>
        <h2 class="font-cormorant font-bold italic text-charcoal leading-none" style="font-size:clamp(2.4rem,4vw,3.8rem)">Featured Products</h2>
        <div class="section-heading-line h-px bg-sand mt-1"></div>
    </div>
    <div class="flex justify-center mb-10 sm:mb-14">
        <div class="flex gap-6 sm:gap-10 md:gap-20 flex-wrap justify-center">
            <button onclick="switchProductTab('new')"  id="ptab-new"  class="tab-trigger active font-cormorant font-semibold" style="font-size:clamp(1.2rem,2.5vw,2rem)">New Arrivals</button>
            <button onclick="switchProductTab('best')" id="ptab-best" class="tab-trigger font-cormorant font-semibold"        style="font-size:clamp(1.2rem,2.5vw,2rem)">Best Sellers</button>
            <button onclick="switchProductTab('sale')" id="ptab-sale" class="tab-trigger font-cormorant font-semibold"        style="font-size:clamp(1.2rem,2.5vw,2rem)">Items Sale</button>
        </div>
    </div>
    <div id="panel-new" class="tab-panel active products-grid" >
        @foreach($newArrivals as $index => $product)
            <div class="product-card-wrap group" style="transition-delay: {{ $index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">
                    <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                         src="{{ $product['img_primary'] }}" alt="{{ $product['name'] }}"/>
                    <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                         src="{{ $product['img_secondary'] }}" alt="{{ $product['name'] }} alt"/>
                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>
                    @if($product['badge'])
                        <span class="absolute top-3 left-0 {{ $product['badge_color'] }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                    {{ $product['badge'] }}
                </span>
                    @endif
                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product['name'] }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product['price'], 2) }}
                        @if($product['old_price'])
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product['old_price'], 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ── BEST SELLERS PANEL ── --}}
    <div id="panel-best" class="tab-panel products-grid">
        @foreach($bestSellers as $index => $product)
            <div class="product-card-wrap group" style="transition-delay: {{ $index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">
                    <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                         src="{{ $product['img_primary'] }}" alt="{{ $product['name'] }}"/>
                    <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                         src="{{ $product['img_secondary'] }}" alt="{{ $product['name'] }} alt"/>
                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>
                    @if($product['badge'])
                        <span class="absolute top-3 left-0 {{ $product['badge_color'] }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                    {{ $product['badge'] }}
                </span>
                    @endif
                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product['name'] }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product['price'], 2) }}
                        @if($product['old_price'])
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product['old_price'], 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ── ITEMS SALE PANEL ── --}}
    <div id="panel-sale" class="tab-panel products-grid">
        @foreach($itemsSale as $index => $product)
            <div class="product-card-wrap group" style="transition-delay: {{ $index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">
                    <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                         src="{{ $product['img_primary'] }}" alt="{{ $product['name'] }}"/>
                    <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                         src="{{ $product['img_secondary'] }}" alt="{{ $product['name'] }} alt"/>
                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>
                    @if($product['badge'])
                        <span class="absolute top-3 left-0 {{ $product['badge_color'] }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                    {{ $product['badge'] }}
                </span>
                    @endif
                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product['name'] }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product['price'], 2) }}
                        @if($product['old_price'])
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product['old_price'], 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- View All CTA --}}
    <div class="flex justify-center mt-14 reveal">
        <a href="#" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[52px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal overflow-hidden transition-colors duration-[350ms] no-underline">
            <span class="relative z-[1]">View All Products</span>
        </a>
    </div>

</section>

<!-- ═══════════════════ INSTAGRAM BANNER ═══════════════════ -->
<section class="bg-[#111110] py-6 min-h-[150px] text-center flex flex-col justify-center rounded-sm">
    <div class="text-white/50 uppercase tracking-[10%] md:tracking-[25%] text-lg font-semibold mb-2">FOLLOW US ON INSTAGRAM</div>
    <div><a href="#" class="text-white text-lg font-semibold tracking-[20%] hover:text-rouge transition-colors duration-300">@saras_creations</a></div>
</section>

<!-- ═══════════════════ FOOTER ═══════════════════ -->
<footer style="background:#111110; color:#FAF6F1; position:relative; overflow:hidden;">

    <!-- Decorative background elements -->
    <div style="position:absolute; top:-80px; right:-80px; width:300px; height:300px; border-radius:50%; border:1px solid rgba(217,79,79,0.08); pointer-events:none;"></div>
    <div style="position:absolute; top:-40px; right:-40px; width:180px; height:180px; border-radius:50%; border:1px solid rgba(217,79,79,0.12); pointer-events:none;"></div>
    <div style="position:absolute; bottom:60px; left:-60px; width:220px; height:220px; border-radius:50%; border:1px solid rgba(250,246,241,0.04); pointer-events:none;"></div>

    <!-- Top decorative strip -->
    <div style="height:3px; background:linear-gradient(90deg, #d94f4f 0%, #E8C9B8 40%, #C9B49A 70%, #d94f4f 100%);"></div>

    <!-- Main footer content -->
    <div style="max-width:1200px; margin:0 auto; padding:64px 32px 40px;">

        <!-- Top section: brand + tagline -->
        <div class="footer-section" style="text-align:center; margin-bottom:56px;">
            <div style="font-family:'Cormorant Garamond', serif; font-size:3.5rem; font-weight:700; letter-spacing:-0.02em; margin-bottom:12px;">
                Sara's<span style="color:#d94f4f;">.</span>
            </div>
            <p style="color:rgba(250,246,241,0.4); font-size:0.6rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; margin-bottom:20px;">
                Handcrafted with love • Macrame &amp; Cotton Arts
            </p>
            <!-- Floating dots decoration -->
            <div style="display:flex; justify-content:center; gap:8px; margin-bottom:0;">
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#d94f4f; display:inline-block;"></span>
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#C9B49A; display:inline-block;"></span>
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#E8C9B8; display:inline-block;"></span>
            </div>
        </div>

        <!-- Divider -->
        <div class="footer-divider" style="margin-bottom:56px;"></div>

        <!-- Grid: links + newsletter + contact -->
        <div style="display:grid; gap:40px; grid-template-columns:1fr;" id="footerGrid">

            <!-- Col 1: Navigation -->
            <div class="footer-section" style="transition-delay:0.1s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Quick Links</p>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <a href="#" class="footer-link">Home</a>
                    <a href="#" class="footer-link">Shop Collection</a>
                    <a href="#" class="footer-link">Our Story</a>
                    <a href="#" class="footer-link">Blog</a>
                    <a href="#" class="footer-link">Contact Us</a>
                </div>
            </div>

            <!-- Col 2: Categories -->
            <div class="footer-section" style="transition-delay:0.2s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Categories</p>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <a href="#" class="footer-link">Wall Hangings</a>
                    <a href="#" class="footer-link">Plant Hangers</a>
                    <a href="#" class="footer-link">Cotton Cords</a>
                    <a href="#" class="footer-link">Boho Decor</a>
                    <a href="#" class="footer-link">Gift Sets</a>
                </div>
            </div>

            <!-- Col 3: Newsletter -->
            <div class="footer-section" style="transition-delay:0.3s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Stay in Touch</p>
                <p style="color:rgba(250,246,241,0.4); font-size:0.8rem; line-height:1.7; margin-bottom:24px;">Get the latest arrivals, exclusive offers and artisan stories straight to your inbox.</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    <input type="email" placeholder="Your email address" class="newsletter-input" style="padding:12px 16px; font-family:Raleway,sans-serif; font-size:0.7rem; letter-spacing:0.1em; border-radius:0;"/>
                    <button onclick="handleSubscribe(this)" style="background:#d94f4f; color:#FAF6F1; border:none; padding:12px 24px; font-family:Raleway,sans-serif; font-size:0.6rem; font-weight:700; letter-spacing:0.25em; text-transform:uppercase; cursor:pointer; transition:background 0.3s ease; position:relative; overflow:hidden;" onmouseover="this.style.background='#c04040'" onmouseout="this.style.background='#d94f4f'">
                        Subscribe &nbsp;<i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <p id="subMsg" style="display:none; color:#C9B49A; font-size:0.65rem; margin-top:10px; letter-spacing:0.1em;">✓ Thank you for subscribing!</p>
            </div>

            <!-- Col 4: Contact -->
            <div class="footer-section" style="transition-delay:0.4s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Contact</p>
                <div style="display:flex; flex-direction:column; gap:14px;">
                    <div style="display:flex; align-items:flex-start; gap:12px;">
                        <i class="fas fa-map-marker-alt" style="color:#d94f4f; font-size:0.75rem; margin-top:3px; flex-shrink:0;"></i>
                        <span style="color:rgba(250,246,241,0.45); font-size:0.75rem; line-height:1.6;">123 Artisan Lane, Craft District, City 10001</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <i class="fas fa-envelope" style="color:#d94f4f; font-size:0.75rem; flex-shrink:0;"></i>
                        <a href="mailto:hello@sarascreations.com" style="color:rgba(250,246,241,0.45); font-size:0.75rem; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='rgba(250,246,241,0.85)'" onmouseout="this.style.color='rgba(250,246,241,0.45)'">hello@sarascreations.com</a>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <i class="fas fa-phone" style="color:#d94f4f; font-size:0.75rem; flex-shrink:0;"></i>
                        <span style="color:rgba(250,246,241,0.45); font-size:0.75rem;">+1 (555) 234-5678</span>
                    </div>
                </div>
                <!-- Social links -->
                <div style="display:flex; gap:10px; margin-top:28px;">
                    <a href="#" class="footer-social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="footer-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social-btn" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="footer-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="footer-social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Bottom divider -->
        <div style="height:1px; background:rgba(250,246,241,0.08); margin:48px 0 24px;"></div>

        <!-- Bottom bar -->
        <div class="footer-section" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px; transition-delay:0.5s;">
            <p style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.15em; text-transform:uppercase;">
                © 2026 Sara's Creations. All Rights Reserved.
            </p>
            <div style="display:flex; gap:20px;">
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Privacy</a>
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Terms</a>
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top -->
<button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" style="display:none; position:fixed; bottom:24px; right:24px; background:#1e1e1e; color:#FAF6F1; width:44px; height:44px; border:none; cursor:pointer; z-index:50; font-size:1rem; box-shadow:0 4px 20px rgba(0,0,0,0.3);">
    <i class="fa fa-angle-up"></i>
</button>

<!-- ═══════════════════ SCRIPTS ═══════════════════ -->
<script>
    $(function () {

        /* ── Owl Carousel ── */
        const totalSlides = 2;
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
            const idx = ((e.item.index - 1) % totalSlides) + 1;
            document.getElementById('slideCounter').textContent = String(idx).padStart(2,'0') + ' / 0' + totalSlides;
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

        /* ── Footer Scroll Reveal ── */
        const footerObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('footer-visible'), i * 100);
                    footerObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.footer-section').forEach(el => footerObserver.observe(el));
        document.querySelectorAll('.footer-divider').forEach(el => footerObserver.observe(el));

        /* ── Responsive banner widths ── */
        function applyResponsive() {
            const isMd = window.innerWidth >= 768;
            document.querySelectorAll('[data-md-width]').forEach(el => {
                el.style.width = isMd ? el.dataset.mdWidth : '100%';
            });
            const isLg = window.innerWidth >= 1024;
            document.querySelectorAll('[data-lg="true"]').forEach(el => {
                el.style.height = isLg ? '760px' : '500px';
                el.style.flex   = isLg ? '1' : 'none';
            });

            // Footer grid responsive
            const fg = document.getElementById('footerGrid');
            if (fg) {
                if (window.innerWidth >= 1024) {
                    fg.style.gridTemplateColumns = 'repeat(4, 1fr)';
                } else if (window.innerWidth >= 640) {
                    fg.style.gridTemplateColumns = 'repeat(2, 1fr)';
                } else {
                    fg.style.gridTemplateColumns = '1fr';
                }
            }
        }
        applyResponsive();
        window.addEventListener('resize', applyResponsive);

        /* ── Back to top button ── */
        window.addEventListener('scroll', () => {
            document.getElementById('backToTop').style.display = window.scrollY > 400 ? 'block' : 'none';
        });

        /* ── Product cards observe on load ── */
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('#panel-new .product-card-wrap').forEach(el => cardObserver.observe(el));

        /* ── Heading line ── */
        const headingObs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    headingObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        document.querySelectorAll('.heading-wrap').forEach(el => headingObs.observe(el));

        /* ── Initial panel fade ── */
        const initialPanel = document.querySelector('.tab-panel.active');
        if (initialPanel) {
            requestAnimationFrame(() => requestAnimationFrame(() => initialPanel.classList.add('fade-in')));
        }
    });

    /* ── Tab Switcher ── */
    function switchProductTab(tab) {
        // 1. Update button active states
        document.querySelectorAll('.tab-trigger').forEach(function(btn) {
            btn.classList.remove('active');
        });
        document.getElementById('ptab-' + tab).classList.add('active');

        // 2. Find the currently visible panel
        var current = document.querySelector('.tab-panel.active');

        if (current && current.id !== 'panel-' + tab) {
            // Fade it out
            current.classList.remove('fade-in');

            setTimeout(function() {
                // Hide it completely
                current.classList.remove('active');
                // Show the new one
                showPanel(tab);
            }, 220); // matches the CSS transition duration (0.45s → use ~220ms)

        } else if (!current) {
            showPanel(tab);
        }
        // If same tab clicked again, do nothing
    }

    function showPanel(tab) {
        var panel = document.getElementById('panel-' + tab);
        if (!panel) return;

        // Step 1: make it display:grid (adds .active → overrides display:none)
        panel.classList.add('active');

        // Step 2: one frame later add fade-in so the transition actually fires
        requestAnimationFrame(function() {
            requestAnimationFrame(function() {
                panel.classList.add('fade-in');

                // Step 3: stagger-animate product cards
                panel.querySelectorAll('.product-card-wrap').forEach(function(card, i) {
                    card.classList.remove('visible');
                    card.style.transitionDelay = (i * 60) + 'ms';
                    setTimeout(function() {
                        card.classList.add('visible');
                    }, 40 + i * 60);
                });
            });
        });
    }

    /* ── Wishlist ── */
    function toggleWish(btn) {
        btn.classList.toggle('wishlisted');
        const icon = btn.querySelector('i');
        if (btn.classList.contains('wishlisted')) {
            icon.classList.remove('fa-regular'); icon.classList.add('fa-solid');
            icon.style.color = 'var(--rouge)';
        } else {
            icon.classList.remove('fa-solid'); icon.classList.add('fa-regular');
            icon.style.color = '';
        }
    }

    /* ── Newsletter ── */
    function handleSubscribe(btn) {
        const msg = document.getElementById('subMsg');
        msg.style.display = 'block';
        btn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
        btn.style.background = '#C9B49A';
        setTimeout(() => {
            msg.style.display = 'none';
            btn.innerHTML = 'Subscribe &nbsp;<i class="fas fa-arrow-right"></i>';
            btn.style.background = '#d94f4f';
        }, 3500);
    }
</script>
</body>
</html>
