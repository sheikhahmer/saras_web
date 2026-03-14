@extends('layouts.app')

@section('title', 'Shop — Sara\'s Creations')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
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
        <button
            class="cat-tab active flex items-center gap-2 px-[26px] py-[18px] text-[0.61rem] font-bold tracking-wide-3 uppercase text-[rgba(30,30,30,0.42)] bg-transparent border-none cursor-pointer whitespace-nowrap flex-shrink-0"
            id="ctab-all"
            onclick="switchCat('all')">
            <i class="fas fa-globe cat-icon text-[0.85rem] transition-transform duration-300"></i>
            All Products
            <span class="cat-count text-[0.54rem] font-bold bg-[rgba(30,30,30,0.07)] text-[rgba(30,30,30,0.38)] px-[7px] py-[2px] rounded-[20px] transition-all duration-[250ms]">
                {{ count($products) }}
            </span>
        </button>
        @foreach($categories as $cat)
            <button
                class="cat-tab flex items-center gap-2 px-[26px] py-[18px] text-[0.61rem] font-bold tracking-wide-3 uppercase text-[rgba(30,30,30,0.42)] bg-transparent border-none cursor-pointer whitespace-nowrap flex-shrink-0"
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
            @include('partials.products_grid', [
                'products' => $products,
                'categoryName' => 'All Products',
                'categorySubtitle' => 'Full Collection',
                'categoryDesc' => 'Every handcrafted piece — from statement wall art to delicate plant hangers.'
            ])
        </div>
</div>

@endsection

@push('scripts')
    @php
        $categoryData = collect([
            ['key' => 'all', 'label' => 'All Products', 'count' => count($products)]
        ])->merge(
            $categories->map(function($c) {
                return [
                    'key' => \Illuminate\Support\Str::slug($c->name),
                    'label' => $c->name,
                    'count' => $c->products ? $c->products->count() : 0
                ];
            })
        )->toArray();
    @endphp

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" defer></script>
    <script src="{{ asset('js/category.js') }}"></script>
@endpush
