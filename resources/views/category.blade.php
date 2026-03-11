@extends('layouts.app')

@section('title', 'Shop — Sara\'s Creations')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endpush

@push('scripts')
    <script>
        window.CATEGORY_DATA = @json($categories);
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <script src="{{ asset('js/category.js') }}"></script>
@endpush

@section('content')

{{-- ══════════════ PAGE HERO ══════════════ --}}
<div class="page-hero relative px-[60px] pt-[120px] pb-[56px] overflow-hidden bg-no-repeat bg-cover bg-opicity-50" style="background-image:url({{ asset('img/slider1.jpg') }})">
    <div class="flex items-center gap-[10px] mb-[22px] text-xs2 font-bold tracking-wide-4 uppercase text-[rgba(250,246,241,0.3)]">
        <a href="{{ route('home') }}" class="text-[rgba(250,246,241,0.3)] no-underline hover:text-rouge transition-colors duration-[250ms]">Home</a>
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
    <div class="absolute bottom-0 left-0 right-0 h-[3px]" style="background:linear-gradient(90deg,#d94f4f,#E8C9B8,#C9B49A,#d94f4f)"></div>
</div>

{{-- ══════════════ CATEGORY TABS BAR ══════════════ --}}
<div class="sticky top-[72px] z-[400] bg-cream border-b border-[rgba(30,30,30,0.08)]">
    <div id="catBar" class="max-w-screen-shop mx-auto px-[60px] flex items-stretch overflow-x-auto">
        @foreach($categories as $cat)
            <button
                class="cat-tab {{ $loop->first ? 'active' : '' }} flex items-center gap-2 px-[26px] py-[18px] text-[0.61rem] font-bold tracking-wide-3 uppercase text-[rgba(30,30,30,0.42)] bg-transparent border-none cursor-pointer whitespace-nowrap flex-shrink-0"
                id="ctab-{{ Str::slug($cat->name) }}"
                onclick="switchCat('{{ Str::slug($cat->name) }}')">
                <i class="fas fa-tag cat-icon text-[0.85rem] transition-transform duration-300"></i>
                {{ $cat->name }}
                <span class="cat-count text-[0.54rem] font-bold bg-[rgba(30,30,30,0.07)] text-[rgba(30,30,30,0.38)] px-[7px] py-[2px] rounded-[20px] transition-all duration-[250ms]">
            {{ $cat->products->count() ?? ''}}
        </span>
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
        <div class="view-btns flex gap-0">
            <button class="view-btn w-[36px] h-[36px] border-[1.5px] border-[rgba(30,30,30,0.13)] bg-charcoal text-white border-charcoal flex items-center justify-center cursor-pointer text-[0.68rem] transition-all duration-[220ms]"
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

    <div class="tab-panel active" id="panel-all">
        <div class="cat-heading flex items-end justify-between mb-9 gap-4" id="heading-all">
            <div>
                <p class="text-tag font-extrabold tracking-wide-7 uppercase text-rouge mb-2">✦ Full Collection</p>
                <h2 class="font-cormorant font-bold italic text-charcoal leading-none text-[clamp(2rem,3.5vw,3rem)]">All Products</h2>
                <p class="text-xs7 text-[rgba(30,30,30,0.42)] leading-[1.7] mt-2 max-w-[420px]">Every handcrafted piece — from statement wall art to delicate plant hangers.</p>
                <div class="cat-heading-line"></div>
            </div>
        </div>

        <div class="products-grid grid grid-cols-shop-4 gap-7 transition-opacity duration-[350ms]" id="grid-all">
            @foreach($products as $i => $p)
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
</div>

@endsection

