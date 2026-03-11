@extends('layouts.app')

@section('title', 'SARAS CREATIONS')

@section('content')

<div class="relative">
    <div class="hero-owl owl-carousel owl-theme">
        @foreach($sliders as $slide)
            <div class="item relative">
                <div class="relative flex items-center overflow-hidden h-screen min-h-[620px]">
                    <div class="absolute inset-0 bg-cover bg-center"
                         style="background-image:url('{{ Storage::url($slide->image) }}')">
                        <div class="absolute inset-0"
                             style="background:linear-gradient(105deg,rgba(250,246,241,0.6) 0%,rgba(250,246,241,0.12) 60%)"></div>
                    </div>
                    <div class="relative z-10 ml-auto w-full max-w-[620px] px-8 py-12 lg:pr-[80px] lg:pl-[40px]"
                         style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">

                        <div class="slide-tag inline-block border border-charcoal/50 text-[0.55rem] tracking-ultra font-bold px-4 py-[6px] uppercase text-charcoal mb-5">
                            {{ $slide->hashtag }}
                        </div>

                        <h1 class="slide-title font-cormorant font-bold italic leading-none uppercase text-charcoal mb-10"
                            style="font-size:clamp(3.2rem,6vw,5.8rem)">
                            {{ $slide->title }}
                        </h1>

                        <div class="slide-btn-wrap">
                            <a href="#" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[42px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal bg-white/25 backdrop-blur-md overflow-hidden transition-colors duration-[350ms] no-underline">
                                <span class="relative z-[1]">Explore Collection</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
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

<div class="reveal overflow-hidden whitespace-nowrap bg-charcoal text-cream py-3">
    <div class="marquee-inner inline-block">
        @foreach($banners as $banner)
            <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase px-12">{{ $banner->name }}<span class="text-rouge"> ✦ </span></span>
        @endforeach
    </div>
</div>

<section class="bg-warm-white">
    <div class="flex flex-wrap">
        <div class="w-full lg:w-3/4 flex-none">
            <div class="flex flex-wrap">

                {{-- First Card --}}
                @if(isset($bannerProducts['Cotton Cord']))
                    <div class="banner-card reveal-left relative overflow-hidden w-full h-[380px]" data-md-width="66.666%">
                        <div class="bg-img" style="background-image:url('{{ Storage::url($bannerProducts['Cotton Cord']->image[0]) }}')"></div>
                        <div class="absolute inset-0 flex items-start p-8 z-10">
                            <div>
                                <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">
                                    {{ $bannerProducts['Cotton Cord']->title }}
                                </h3>
                                <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Second Card --}}
                @if(isset($bannerProducts['Wooden Beads']))
                    <div class="banner-card reveal relative overflow-hidden w-full h-[380px] bg-[#F5EDE6]" data-md-width="33.333%">
                        <div class="bg-img" style="background-image:url('{{ Storage::url($bannerProducts['Wooden Beads']->image[0]) }}')"></div>
                        <div class="absolute inset-0 flex items-center p-8 z-10">
                            <div>
                                <p class="text-[0.55rem] font-bold tracking-wide-3 uppercase text-rouge mb-2">{{ $bannerProducts['Wooden Beads']->category->name }}</p>
                                <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">
                                    {{ $bannerProducts['Wooden Beads']->title }}
                                </h3>
                                <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Third Card --}}
                @if(isset($bannerProducts['Wall Hanging']))
                    <div class="banner-card reveal relative overflow-hidden w-full h-[380px]" data-md-width="33.333%">
                        <div class="bg-img" style="background-image:url('{{ Storage::url($bannerProducts['Wall Hanging']->image[0]) }}')"></div>
                        <div class="absolute inset-0 flex items-end justify-end p-8 z-10">
                            <div class="text-left">
                                <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">
                                    {{ $bannerProducts['Wall Hanging']->title }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Fourth Card --}}
                @if(isset($bannerProducts['Bags']))
                    <div class="banner-card reveal-right relative overflow-hidden w-full h-[380px]" data-md-width="66.666%">
                        <div class="bg-img" style="background-image:url('{{ Storage::url($bannerProducts['Plant Hanger']->image[0]) }}')"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-center p-8 z-10">
                            <div>
                                <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 tracking-wide-2" style="font-size:clamp(1.6rem,2.5vw,2.2rem)">
                                    {{ $bannerProducts['Plant Hanger']->title }}
                                </h3>
                                <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

        {{-- Fifth Card --}}
        @if(isset($bannerProducts['Wall Hanging']))
            <div class="banner-card reveal-right relative overflow-hidden w-full h-[500px] flex-none" data-lg="true">
                <div class="bg-img" style="background-image:url('{{ Storage::url($bannerProducts['Wall Hanging']->image[0]) }}')"></div>
                <div class="absolute inset-0 flex items-start justify-center text-center pt-10 z-10">
                    <div>
                        <h3 class="font-cormorant font-semibold leading-[1.25] text-[#2a2a2a] mb-5 text-[2rem]">
                            {{ $bannerProducts['Wall Hanging']->title }}
                        </h3>
                        <a href="#" class="banner-link text-[0.6rem] font-bold tracking-wide-2 uppercase text-charcoal no-underline relative pb-1 inline-block">Shop now</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>

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
            <button onclick="switchProductTab('sale')" id="ptab-sale" class="tab-trigger font-cormorant font-semibold"        style="font-size:clamp(1.2rem,2.5vw,2rem)">Featured</button>
        </div>
    </div>
    <div id="panel-new" class="tab-panel active products-grid">
        @foreach($newArrivals as $index => $product)
            @php
                $images = is_array($product->image) ? $product->image : json_decode($product->image, true);
                $primaryImage = $images[0] ?? null;
                $secondaryImage = $images[1] ?? ($images[0] ?? null);
                $badge = $product->is_featured === 'new_arrival' ? 'New Arrival' : ($product->is_featured === 'best_seller' ? 'Best Seller' : null);
                $badgeColor = $product->is_featured === 'new_arrival' ? 'bg-red-500' : 'bg-green-500';
            @endphp
            <div class="product-card-wrap group" style="transition-delay: {{ $loop->index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">

                    @if($primaryImage)
                        <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                             src="{{ Storage::url($primaryImage) }}"
                             alt="{{ $product->title }}" />
                    @endif

                    @if($secondaryImage)
                        <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                             src="{{ Storage::url($secondaryImage) }}"
                             alt="{{ $product->title }} alt" />
                    @endif

                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>

                    @if($badge)
                        <span class="absolute top-3 left-0 {{ $badgeColor }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                        {{ $badge }}
                    </span>
                    @endif

                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>

                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product->title }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product->price, 2) }}
                        @if(isset($product->old_price))
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="panel-best" class="tab-panel products-grid">
        @foreach($bestSellers as $product)
            @php
                // Decode images JSON if it's a string
                $images = is_array($product->image) ? $product->image : json_decode($product->image, true);
                $primaryImage = $images[0] ?? null;
                $secondaryImage = $images[1] ?? ($images[0] ?? null);

                // Badge logic
                $badge = $product->is_featured === 'best_seller' ? 'Best Seller' :
                         ($product->is_featured === 'new_arrival' ? 'New Arrival' : null);
                $badgeColor = $product->is_featured === 'best_seller' ? 'bg-green-500' :
                              ($product->is_featured === 'new_arrival' ? 'bg-red-500' : '');
            @endphp

            <div class="product-card-wrap group" style="transition-delay: {{ $index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">
                    @if($primaryImage)
                        <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                             src="{{ Storage::url($primaryImage) }}" alt="{{ $product->title }}" />
                    @endif

                    @if($secondaryImage)
                        <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                             src="{{ Storage::url($secondaryImage) }}" alt="{{ $product->title }} alt" />
                    @endif

                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>

                    @if($badge)
                        <span class="absolute top-3 left-0 {{ $badgeColor }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                    {{ $badge }}
                </span>
                    @endif

                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>

                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product->title }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product->price, 2) }}
                        @if(isset($product->old_price) && $product->old_price)
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="panel-sale" class="tab-panel products-grid">
        @foreach($featured as $product)
            @php
                $images = is_array($product->image) ? $product->image : json_decode($product->image, true);
                $primaryImage = $images[0] ?? null;
                $secondaryImage = $images[1] ?? ($images[0] ?? null);
                $badge = $product->is_featured === 'featured' ? 'featured' : null;
                $badgeColor = $product->is_featured === 'featured' ? 'bg-blue-500' : '';
            @endphp

            <div class="product-card-wrap group" style="transition-delay: {{ $index * 60 }}ms">
                <div class="relative overflow-hidden bg-cream mb-3 sm:mb-4" style="padding-bottom:125%">
                    @if($primaryImage)
                        <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                             src="{{ Storage::url($primaryImage) }}" alt="{{ $product->title }}" />
                    @endif

                    @if($secondaryImage)
                        <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                             src="{{ Storage::url($secondaryImage) }}" alt="{{ $product->title }} alt" />
                    @endif

                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                         style="background:rgba(30,30,30,0.08)">
                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                            Add to Cart
                        </button>
                    </div>

                    @if($badge)
                        <span class="absolute top-3 left-0 {{ $badgeColor }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">
                    {{ $badge }}
                </span>
                    @endif

                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                    </button>
                </div>

                <div class="text-center">
                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $product->title }}</h4>
                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                        ${{ number_format($product->price, 2) }}
                        @if(isset($product->old_price) && $product->old_price)
                            <span class="line-through text-gray-300 text-[0.85rem]">${{ number_format($product->old_price, 2) }}</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-14 reveal">
        <a href="{{route('category')}}" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[52px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal overflow-hidden transition-colors duration-[350ms] no-underline">
            <span class="relative z-[1]">View All Products</span>
        </a>
    </div>
</section>

<section class="bg-[#111110] py-6 min-h-[150px] text-center flex flex-col justify-center rounded-sm">
    <div class="text-white/50 uppercase tracking-[10%] md:tracking-[25%] text-lg font-semibold mb-2">FOLLOW US ON INSTAGRAM</div>
    <div><a href="#" class="text-white text-lg font-semibold tracking-[20%] hover:text-rouge transition-colors duration-300">@saras_creation8</a></div>
</section>

@endsection

