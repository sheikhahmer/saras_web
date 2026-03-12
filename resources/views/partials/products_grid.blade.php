<div class="cat-heading flex items-end justify-between mb-9 gap-4" id="heading-all">
    <div>
        <p class="text-tag font-extrabold tracking-wide-7 uppercase text-rouge mb-2">✦ {{ $categorySubtitle ?? 'Collection' }}</p>
        <h2 class="font-cormorant font-bold italic text-charcoal leading-none text-[clamp(2rem,3.5vw,3rem)]">{{ $categoryName ?? 'All Products' }}</h2>
        <p class="text-xs7 text-[rgba(30,30,30,0.42)] leading-[1.7] mt-2 max-w-[420px]">{{ $categoryDesc ?? 'Every handcrafted piece — from statement wall art to delicate plant hangers.' }}</p>
        <div class="cat-heading-line"></div>
    </div>
</div>

<div class="products-grid grid grid-cols-shop-4 gap-7 transition-opacity duration-[350ms] cursor-pointer" id="grid-all">
    @forelse($products as $i => $p)
        @php
            // Mockup properties for aesthetic view
            $img1 = is_array($p->image) && count($p->image) > 0 ? asset('storage/'.$p->image[0]) : asset('img/slider1.jpg');
            $img2 = is_array($p->image) && count($p->image) > 1 ? asset('storage/'.$p->image[1]) : $img1;
            $catName = $p->category ? $p->category->name : 'Uncategorized';
            $rating = 5;
            $reviews = 12;
            $price = $p->price ?? 0;
            $oldPrice = null;
        @endphp
        <div class="product-card" style="transition-delay:{{ $i * 55 }}ms" data-price="{{ $price }}" data-rating="{{ $rating }}">
            <a href="{{ route('product.show', ['id' => $p->id]) }}" class="block no-underline">
                <div class="relative overflow-hidden bg-cream mb-[14px]" style="padding-bottom:120%">
                    <img class="card-img absolute inset-0 w-full h-full object-cover" src="{{ $img1 }}" alt="{{ $p->title }}"/>
                    <img class="card-img-hover absolute inset-0 w-full h-full object-cover" src="{{ $img2 }}" alt="{{ $p->title }}"/>
                    <div class="card-overlay absolute inset-0 bg-[rgba(30,30,30,0.07)] opacity-0 flex flex-col items-center justify-end pb-[18px] gap-2">
                        <button class="btn-cart px-[22px] py-[10px] bg-white text-charcoal border-none cursor-pointer font-raleway text-xs2 font-bold tracking-wide-3 uppercase" onclick="event.preventDefault();">Add to Cart</button>
                        <button class="btn-view px-[18px] py-[6px] bg-transparent text-white border border-[rgba(255,255,255,0.45)] cursor-pointer font-raleway text-[0.56rem] font-bold tracking-wide-2 uppercase" onclick="event.preventDefault();">Quick View</button>
                    </div>
                    @if($p->is_featured == \App\Models\Product::NEW_ARRIVAL)
                        <span class="absolute top-3 left-0 z-[2] px-[11px] py-[5px] bg-[#d94f4f] text-white text-2xs font-extrabold tracking-wide-2 uppercase">New</span>
                    @elseif($p->is_featured == \App\Models\Product::BEST_SELLER)
                        <span class="absolute top-3 left-0 z-[2] px-[11px] py-[5px] bg-[#d4a843] text-white text-2xs font-extrabold tracking-wide-2 uppercase">Best Seller</span>
                    @endif
                    <button class="wish-btn absolute top-3 right-3 z-[2] w-[32px] h-[32px] rounded-full bg-[rgba(253,250,247,0.82)] backdrop-blur-sm border-none cursor-pointer flex items-center justify-center text-[0.72rem] text-[rgba(30,30,30,0.38)] transition-all duration-[250ms] hover:scale-[1.18] hover:text-rouge hover:bg-white"
                            onclick="event.preventDefault(); toggleWish(this)">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="text-center">
                    <p class="text-tag font-bold tracking-wide-5 uppercase text-[rgba(30,30,30,0.42)] mb-[5px]">
                        {{ $catName }}
                    </p>
                    <h3 class="font-cormorant text-[1.05rem] font-semibold text-charcoal mb-[5px]">{{ $p->title }}</h3>
                    <div class="flex items-center justify-center gap-[2px] mb-[6px]">
                        @for($s=1;$s<=5;$s++)
                            <span class="text-[0.55rem] {{ $s<=$rating ? 'text-[#d4a843]' : 'text-[#e0d4c0]' }}">★</span>
                        @endfor
                        <span class="text-[0.56rem] text-[rgba(30,30,30,0.42)] ml-1">({{ $reviews }})</span>
                    </div>
                    <p class="font-cormorant text-[1.05rem] font-semibold text-charcoal">
                        @if($oldPrice)
                            <span class="text-rouge">${{ number_format($price,2) }}</span>
                            <del class="text-[rgba(30,30,30,0.28)] text-[0.85rem] ml-[5px]">${{ number_format($oldPrice,2) }}</del>
                        @else
                            <span>${{ number_format($price,2) }}</span>
                        @endif
                    </p>
                </div>
            </a>
        </div>
    @empty
        <div class="col-span-full text-center py-[80px]">
            <p class="text-[rgba(30,30,30,0.42)] text-[0.9rem] font-raleway uppercase tracking-wide-2">No products found for this category.</p>
        </div>
    @endforelse
</div>

<div class="reveal flex justify-center mt-14">
    @if($products->count() > 0)
    <button class="btn-load relative overflow-hidden border-[1.5px] border-charcoal px-[52px] py-[14px] font-raleway text-xs5 font-bold tracking-wide-5 uppercase text-charcoal bg-transparent cursor-pointer transition-colors duration-[350ms]"
            onclick="handleLoadMore(this)">
        <span>Load More</span>
    </button>
    @endif
</div>
