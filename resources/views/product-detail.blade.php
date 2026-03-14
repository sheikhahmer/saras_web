@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.app')

@section('title', $product->title . ' — SARAS CREATIONS')

@section('content')
    <div class="bg-cream border-b border-charcoal/[0.07]">
        <div class="max-w-[1200px] mx-auto px-6 lg:px-[60px] py-4 flex items-center gap-2 text-[0.55rem] font-bold tracking-wide-4 uppercase text-charcoal/50">
            <a href="/" class="hover:text-rouge transition-colors duration-200 no-underline">Home</a>
            <span class="text-charcoal/30">✦</span>
            <a href="/shop" class="hover:text-rouge transition-colors duration-200 no-underline">Shop</a>
            <span class="text-charcoal/30">✦</span>
            <span class="text-charcoal">{{ $product->title }}</span>
        </div>
    </div>

    <section class="bg-warm-white py-12 lg:py-20 px-4 sm:px-6 lg:px-[60px]">
        <div class="max-w-[1200px] mx-auto">
            <div class="product-detail-grid grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-start">

                <div class="reveal-left product-gallery-wrap">
                    <div class="main-img-wrap relative overflow-hidden bg-cream" style="padding-bottom:115%">
                        @php
                            // Handle image - could be string or array
                            $images = is_string($product->image) ? json_decode($product->image, true) : $product->image;
                            $primaryImage = is_array($images) && count($images) > 0 ? Storage::url($images[0]) : 'https://via.placeholder.com/600x800';
                            $galleryImages = is_array($images) ? $images : [];
                        @endphp

                        <img
                            id="mainProductImg"
                            src="{{ $primaryImage }}"
                            alt="{{ $product->title }}"
                            class="absolute inset-0 w-full h-full object-cover transition-all duration-700"
                        />

                        @if($product->is_featured)
                            @php
                                $badge = $product->is_featured;
                                $badgeColor = match($badge) {
                                    'best_seller' => 'bg-amber-600',
                                    'new_arrival' => 'bg-emerald-600',
                                    'featured' => 'bg-rouge',
                                    default => 'bg-charcoal'
                                };
                                $badgeLabel = match($badge) {
                                    'best_seller' => 'Best Seller',
                                    'new_arrival' => 'New Arrival',
                                    'featured' => 'Featured',
                                    default => ucfirst($badge)
                                };
                            @endphp
                            <span class="absolute top-5 left-0 {{ $badgeColor }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase z-10">
                                {{ $badgeLabel }}
                            </span>
                        @endif

                        <button class="wish-btn absolute top-5 right-5 bg-white/80 backdrop-blur-sm border-0 w-10 h-10 flex items-center justify-center cursor-pointer z-10 hover:bg-white transition-colors duration-200" onclick="toggleWish(this)" aria-label="Add to wishlist">
                            <i class="fa-regular fa-heart text-gray-400 text-base"></i>
                        </button>

                        <div class="absolute bottom-5 right-5 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                            <span class="text-[0.5rem] font-bold tracking-wide-3 uppercase bg-white/80 text-charcoal px-3 py-1 backdrop-blur-sm">Hover to zoom</span>
                        </div>

                        <div id="imgZoomLens" class="absolute inset-0 cursor-crosshair z-20"></div>
                    </div>

                    @if(count($galleryImages) > 1)
                        <div class="thumb-strip flex gap-3 mt-3 overflow-x-auto pb-1 scrollbar-hide">
                            @foreach($galleryImages as $i => $thumb)
                                <button
                                    onclick="switchMainImg(this, '{{ Storage::url($thumb) }}')"
                                    class="thumb-btn flex-none w-[80px] h-[80px] overflow-hidden border-[1.5px] {{ $i === 0 ? 'border-charcoal' : 'border-transparent' }} transition-all duration-200 hover:border-charcoal/50 cursor-pointer bg-cream"
                                    style="padding: 0"
                                >
                                    <img src="{{ Storage::url($thumb) }}" alt="View {{ $i+1 }}" class="w-full h-full object-cover"/>
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="reveal product-info-wrap pt-2 lg:pt-4">

                    <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge mb-3">{{ $product->category->name ?? 'Macrame Decor' }}</p>

                    <h1 class="font-cormorant font-bold italic leading-none text-charcoal mb-4" style="font-size:clamp(2.2rem,4vw,3.4rem)">
                        {{ $product->title }}
                    </h1>

{{--                    <div class="flex items-center gap-3 mb-6">--}}
{{--                        <div class="flex gap-[3px]">--}}
{{--                            @for($s = 1; $s <= 5; $s++)--}}
{{--                                <i class="fa-{{ $s <= 5 ? 'solid' : 'regular' }} fa-star text-rouge text-[0.65rem]"></i>--}}
{{--                            @endfor--}}
{{--                        </div>--}}
{{--                        <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase text-charcoal/50">(24 Reviews)</span>--}}
{{--                    </div>--}}

                    <div class="flex items-baseline gap-4 mb-8 pb-8 border-b border-charcoal/[0.08]">
                        @if($product->has_offer && $product->old_price && $product->new_price)
                            <span class="font-cormorant font-bold text-charcoal" style="font-size:clamp(1.8rem,3vw,2.4rem)">
                                Rs {{ number_format($product->new_price, 2) }}
                            </span>
                            <span class="font-cormorant line-through text-gray-300 text-[1.2rem]">
                                Rs {{ number_format($product->old_price, 2) }}
                            </span>
                            <span class="text-[0.55rem] font-bold tracking-wide-3 bg-rouge text-white px-2 py-1 uppercase">
                                Save {{ round((1 - $product->new_price/$product->old_price)*100) }}%
                            </span>
                        @else
                            <span class="font-cormorant font-bold text-charcoal" style="font-size:clamp(1.8rem,3vw,2.4rem)">
                                Rs {{ number_format($product->price ?? 0, 2) }}
                            </span>
                        @endif
                    </div>

                    <p class="text-charcoal/70 text-[0.85rem] leading-relaxed mb-8 font-raleway" style="letter-spacing:0.02em">
                        {!! $product->description !!}
                    </p>

{{--                    <div class="flex items-stretch gap-3 mb-5">--}}
{{--                        <div class="flex items-stretch border-[1.5px] border-charcoal/30">--}}
{{--                            <button onclick="changeQty(-1)" class="qty-btn px-4 text-charcoal text-base font-bold hover:bg-charcoal hover:text-white transition-colors duration-200 cursor-pointer">−</button>--}}
{{--                            <input id="qtyInput" type="number" value="1" min="1" max="99" readonly--}}
{{--                                   class="w-[52px] text-center text-[0.85rem] font-bold text-charcoal bg-transparent border-x border-charcoal/30 outline-none"/>--}}
{{--                            <button onclick="changeQty(1)" class="qty-btn px-4 text-charcoal text-base font-bold hover:bg-charcoal hover:text-white transition-colors duration-200 cursor-pointer">+</button>--}}
{{--                        </div>--}}
{{--                        <button id="addToCartBtn" class="add-cart-btn flex-1 relative bg-charcoal text-white text-[0.65rem] font-bold tracking-wide-4 uppercase px-6 py-[14px] overflow-hidden transition-all duration-300 cursor-pointer hover:bg-rouge">--}}
{{--                        <span class="relative z-[1] flex items-center justify-center gap-2">--}}
{{--                            <i class="fas fa-shopping-bag text-xs"></i>--}}
{{--                            Add to Cart--}}
{{--                        </span>--}}
{{--                        </button>--}}
{{--                    </div>--}}

                    @php
                        // Your WhatsApp Business number (Pakistan format)
                        $phoneNumber = '923166448508'; // Remove 0, add 92 country code

                        // Create professional formatted message
                        $message = "";
                        $message .= "🔷 *NEW PRODUCT INQUIRY* 🔷%0A";
                        $message .= "═════════════════════════%0A%0A";

                        $message .= "📋 *Product Details*%0A";
                        $message .= "▸ *Name:* " . $product->title . "%0A";

                        if($product->has_offer && $product->old_price && $product->new_price) {
                            $message .= "▸ *Offer Price:* Rs " . number_format($product->new_price, 2) . "%0A";
                            $message .= "▸ *Regular Price:* Rs " . number_format($product->old_price, 2) . "%0A";
                            $message .= "▸ *You Save:* Rs " . number_format($product->old_price - $product->new_price, 2) . " (" . round((1 - $product->new_price/$product->old_price)*100) . "%)%0A";
                        } else {
                            $message .= "▸ *Price:* Rs " . number_format($product->price ?? 0, 2) . "%0A";
                        }

                        if($product->category) {
                            $message .= "▸ *Category:* " . $product->category->name . "%0A";
                        }

                        $message .= "▸ *SKU:* SC-" . str_pad($product->id, 5, '0', STR_PAD_LEFT) . "%0A%0A";

                        $message .= "🔗 *Product Link*%0A";
                        $message .= "▸ " . url('/product/' . $product->id) . "%0A%0A";

                        $message .= "👤 *Customer Information*%0A";
                        $message .= "▸ *Name:* [Customer to fill]%0A";
                        $message .= "▸ *Phone:* [Customer to fill]%0A";
                        $message .= "▸ *Quantity:* [Customer to fill]%0A%0A";

                        $message .= "✅ *Next Steps*%0A";
                        $message .= "Please confirm:%0A";
                        $message .= "• Current stock availability%0A";
                        $message .= "• Payment options (Bank Transfer / JazzCash / EasyPaisa)%0A";
                        $message .= "• Delivery charges and timeline%0A%0A";

                        $message .= "─────────────────────────%0A";
                        $message .= "🙏 Thank you for choosing SARAS CREATIONS!";

                        // Encode for URL
                        $whatsappLink = "https://api.whatsapp.com/send?phone={$phoneNumber}&text=" . $message;
                    @endphp

                    <a href="{{ $whatsappLink }}"
                       target="_blank"
                       class="block text-center border-[1.5px] border-charcoal px-6 py-[14px] text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[350ms] hover:bg-charcoal hover:text-white mb-8">
                        <i class="fab fa-whatsapp mr-2"></i> Buy Now on WhatsApp
                    </a>

                    <div class="space-y-2 text-[0.6rem] font-bold tracking-wide-3 uppercase text-charcoal/50 pb-8 border-b border-charcoal/[0.08]">
                        <p><span class="text-charcoal mr-2">SKU:</span>SC-{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</p>
                        <p><span class="text-charcoal mr-2">Category:</span>{{ $product->category->name ?? 'Macrame Decor' }}</p>
                        <p><span class="text-charcoal mr-2">Tags:</span>{{ $product->tags ?? 'Macrame, Handcraft, Decor' }}</p>
                    </div>

                    <div class="flex items-center gap-5 pt-6">
                        <span class="text-[0.55rem] font-bold tracking-wide-4 uppercase text-charcoal/50">Share:</span>
                        <a href="#" class="text-charcoal/50 hover:text-rouge transition-colors duration-200 text-sm"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-charcoal/50 hover:text-rouge transition-colors duration-200 text-sm"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="text-charcoal/50 hover:text-rouge transition-colors duration-200 text-sm"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-charcoal/50 hover:text-rouge transition-colors duration-200 text-sm"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-cream border-t border-charcoal/[0.07] border-b border-charcoal/[0.07]">
        <div class="max-w-[1200px] mx-auto px-8 py-10 grid gap-8 text-center" style="grid-template-columns:repeat(auto-fit,minmax(180px,1fr))">
            <div class="reveal delay-[100ms] flex flex-col items-center gap-2">
                <div class="text-[1.2rem] text-rouge"><i class="fas fa-truck"></i></div>
                <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase">Trusted Shipping</p>
                <p class="text-[0.72rem] text-gray-400">Orders over $150</p>
            </div>
            <div class="reveal delay-[200ms] flex flex-col items-center gap-2">
                <div class="text-[1.2rem] text-rouge"><i class="fas fa-shield-alt"></i></div>
                <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase">Secure Payment</p>
                <p class="text-[0.72rem] text-gray-400">100% secure checkout</p>
            </div>
            <div class="reveal delay-[300ms] flex flex-col items-center gap-2">
                <div class="text-[1.2rem] text-rouge"><i class="fas fa-undo"></i></div>
                <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase">Easy Returns</p>
                <p class="text-[0.72rem] text-gray-400">30 day return policy</p>
            </div>
            <div class="reveal delay-[450ms] flex flex-col items-center gap-2">
                <div class="text-[1.2rem] text-rouge"><i class="fas fa-hand-sparkles"></i></div>
                <p class="text-[0.6rem] font-bold tracking-wide-5 uppercase">Handcrafted</p>
                <p class="text-[0.72rem] text-gray-400">Made with love & care</p>
            </div>
        </div>
    </section>

    <section class="bg-warm-white py-16 px-4 sm:px-6 lg:px-[60px]">
        <div class="max-w-[1200px] mx-auto">

            <div class="flex gap-8 md:gap-16 border-b border-charcoal/[0.1] mb-12 flex-wrap">
                <button onclick="switchDetailTab('description')" id="dtab-description" class="detail-tab-trigger active pb-4 text-[0.65rem] font-bold tracking-wide-4 uppercase transition-colors duration-200">Description</button>
                <button onclick="switchDetailTab('details')"     id="dtab-details"     class="detail-tab-trigger pb-4 text-[0.65rem] font-bold tracking-wide-4 uppercase transition-colors duration-200">Details & Care</button>
{{--                <button onclick="switchDetailTab('reviews')"     id="dtab-reviews"     class="detail-tab-trigger pb-4 text-[0.65rem] font-bold tracking-wide-4 uppercase transition-colors duration-200">Reviews (24)</button>--}}
            </div>

            <div id="dpanel-description" class="detail-tab-panel active reveal">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge mb-3">About This Piece</p>
                        <h2 class="font-cormorant font-bold italic text-charcoal leading-tight mb-6" style="font-size:clamp(1.8rem,3vw,2.6rem)">
                            Handcrafted<br/>with Intention
                        </h2>
                        <div class="space-y-4 text-charcoal/70 text-[0.85rem] leading-relaxed font-raleway prose prose-sm max-w-none" style="letter-spacing:0.02em">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="relative overflow-hidden" style="padding-bottom:65%">
                        <img src="{{ $primaryImage }}" alt="Product detail" class="absolute inset-0 w-full h-full object-cover"/>
                    </div>
                </div>
            </div>

            <div id="dpanel-details" class="detail-tab-panel reveal" style="display:none">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div>
                        <h3 class="font-cormorant font-semibold text-charcoal text-[1.4rem] mb-5">Product Details</h3>
                        <table class="w-full text-[0.78rem]">
                            @php
                                $specs = [
                                    ['label' => 'Material', 'value' => '100% Cotton Cord'],
                                    ['label' => 'Dimensions', 'value' => '60 cm × 40 cm'],
                                    ['label' => 'Weight', 'value' => '350g'],
                                    ['label' => 'Color', 'value' => 'Natural White'],
                                    ['label' => 'Finish', 'value' => 'Hand-knotted'],
                                    ['label' => 'Origin', 'value' => 'Handmade in India'],
                                ];
                            @endphp
                            @foreach($specs as $spec)
                                <tr class="border-b border-charcoal/[0.07]">
                                    <td class="py-3 pr-6 text-[0.6rem] font-bold tracking-wide-3 uppercase text-charcoal/50 w-[40%]">{{ $spec['label'] }}</td>
                                    <td class="py-3 text-charcoal font-raleway">{{ $spec['value'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div>
                        <h3 class="font-cormorant font-semibold text-charcoal text-[1.4rem] mb-5">Care Instructions</h3>
                        <ul class="space-y-3">
                            @foreach([
                                'Spot clean with a damp cloth only',
                                'Avoid direct sunlight to preserve colour',
                                'Do not machine wash or tumble dry',
                                'Gently reshape fibres as needed',
                                'Store in a cool, dry place'
                            ] as $tip)
                                <li class="flex items-start gap-3 text-[0.82rem] font-raleway text-charcoal/70" style="letter-spacing:0.02em">
                                    <span class="text-rouge mt-[3px] text-xs flex-none">✦</span>
                                    {{ $tip }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div id="dpanel-reviews" class="detail-tab-panel reveal" style="display:none">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="flex flex-col items-center text-center pt-2">
                        <div class="font-cormorant font-bold text-charcoal leading-none mb-1" style="font-size:5rem">4.8</div>
                        <div class="flex gap-1 mb-2">
                            @for($s=1;$s<=5;$s++)
                                <i class="fa-solid fa-star text-rouge text-sm"></i>
                            @endfor
                        </div>
                        <p class="text-[0.6rem] font-bold tracking-wide-4 uppercase text-charcoal/50 mb-8">Based on 24 reviews</p>
                        @foreach([5=>85,4=>10,3=>3,2=>1,1=>1] as $star => $pct)
                            <div class="flex items-center gap-3 w-full mb-2">
                                <span class="text-[0.6rem] font-bold text-charcoal/50 w-4">{{ $star }}</span>
                                <i class="fa-solid fa-star text-rouge text-[0.55rem]"></i>
                                <div class="flex-1 h-[3px] bg-charcoal/10 relative overflow-hidden">
                                    <div class="absolute left-0 top-0 h-full bg-rouge review-bar" style="width:0%" data-w="{{ $pct }}%"></div>
                                </div>
                                <span class="text-[0.6rem] font-bold text-charcoal/40 w-6">{{ $pct }}%</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="lg:col-span-2 space-y-6">
                        @foreach([
                            ['name'=>'Priya S.','stars'=>5,'date'=>'Jan 2026','text'=>'Absolutely stunning piece. The craftsmanship is exceptional and it looks even better in person. Shipping was fast and carefully packaged.'],
                            ['name'=>'Emma W.','stars'=>5,'date'=>'Dec 2025','text'=>'I ordered the large size and it fills the wall perfectly. The quality of the cotton cord is superb. Will definitely be ordering again!'],
                            ['name'=>'Riya K.','stars'=>4,'date'=>'Nov 2025','text'=>'Beautiful work. Very detailed knotting and the natural colour goes with everything. Slight delay in shipping but the product made up for it.'],
                        ] as $rev)
                            <div class="review-card reveal border-b border-charcoal/[0.07] pb-6">
                                <div class="flex items-start justify-between mb-2 gap-4">
                                    <div>
                                        <p class="text-[0.65rem] font-bold tracking-wide-3 uppercase text-charcoal">{{ $rev['name'] }}</p>
                                        <p class="text-[0.58rem] font-bold tracking-wide-3 uppercase text-charcoal/40 mt-[2px]">{{ $rev['date'] }}</p>
                                    </div>
                                    <div class="flex gap-[3px] flex-none mt-[2px]">
                                        @for($s=1;$s<=5;$s++)
                                            <i class="fa-{{ $s<=$rev['stars'] ? 'solid' : 'regular' }} fa-star text-rouge text-[0.6rem]"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-charcoal/65 text-[0.82rem] font-raleway leading-relaxed" style="letter-spacing:0.02em">{{ $rev['text'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    @if($relatedProducts && $relatedProducts->count() > 0)
        <section class="bg-cream py-16 px-4 sm:px-6 lg:px-[60px] border-t border-charcoal/[0.07]">
            <div class="max-w-[1200px] mx-auto">
                <div class="heading-wrap reveal mb-10 sm:mb-14 flex flex-col items-center text-center gap-3">
                    <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge">You May Also Like</p>
                    <h2 class="font-cormorant font-bold italic text-charcoal leading-none" style="font-size:clamp(2.2rem,4vw,3.4rem)">Related Products</h2>
                    <div class="section-heading-line h-px bg-sand mt-1"></div>
                </div>

                <div class="products-grid grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($relatedProducts as $index => $rp)
                        @php
                            $rpImages = is_string($rp->image) ? json_decode($rp->image, true) : $rp->image;
                            $rpPrimary = is_array($rpImages) && count($rpImages) > 0 ? Storage::url($rpImages[0]) : 'https://via.placeholder.com/400x500';
                            $rpSecondary = is_array($rpImages) && count($rpImages) > 1 ? Storage::url($rpImages[1]) : $rpPrimary;

                            $rpBadge = $rp->is_featured;
                            $rpBadgeColor = match($rpBadge) {
                                'best_seller' => 'bg-amber-600',
                                'new_arrival' => 'bg-emerald-600',
                                'featured' => 'bg-rouge',
                                default => 'bg-charcoal'
                            };
                            $rpBadgeLabel = match($rpBadge) {
                                'best_seller' => 'Best Seller',
                                'new_arrival' => 'New Arrival',
                                'featured' => 'Featured',
                                default => ucfirst($rpBadge)
                            };
                        @endphp
                        <div class="product-card-wrap group" style="transition-delay:{{ $index * 60 }}ms">
                            <a href="{{ route('product.show', $rp->id) }}" class="block no-underline">
                                <div class="relative overflow-hidden bg-[#F5EDE6] mb-3 sm:mb-4" style="padding-bottom:125%">
                                    <img class="product-img-primary absolute inset-0 w-full h-full object-cover transition-opacity duration-500"
                                         src="{{ $rpPrimary }}" alt="{{ $rp->title }}"/>
                                    <img class="product-img-secondary absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500"
                                         src="{{ $rpSecondary }}" alt="{{ $rp->title }} alternate view"/>
                                    <div class="product-overlay absolute inset-0 flex items-end justify-center pb-5 opacity-0 transition-opacity duration-300"
                                         style="background:rgba(30,30,30,0.08)">
                                        <button class="add-cart-btn bg-white text-charcoal text-[0.6rem] font-bold tracking-wide-4 uppercase px-5 py-[10px] hover:bg-charcoal hover:text-white transition-colors duration-250 cursor-pointer">
                                            Add to Cart
                                        </button>
                                    </div>
                                    @if($rp->is_featured)
                                        <span class="absolute top-3 left-0 {{ $rpBadgeColor }} text-white text-[0.55rem] font-bold tracking-wide-3 px-3 py-[5px] uppercase">{{ $rpBadgeLabel }}</span>
                                    @endif
                                    <button class="wish-btn absolute top-3 right-3 bg-transparent border-0 cursor-pointer" onclick="toggleWish(this)">
                                        <i class="fa-regular fa-heart text-gray-400 text-lg"></i>
                                    </button>
                                </div>
                                <div class="text-center">
                                    <h4 class="font-raleway text-[0.65rem] tracking-wide-4 uppercase text-gray-400 mb-1">{{ $rp->title }}</h4>
                                    <p class="font-cormorant font-semibold text-charcoal text-[1.1rem]">
                                        @if($rp->has_offer && $rp->old_price && $rp->new_price)
                                            Rs {{ number_format($rp->new_price, 2) }}
                                            <span class="line-through text-gray-300 text-[0.85rem]">Rs {{ number_format($rp->old_price, 2) }}</span>
                                        @else
                                            Rs {{ number_format($rp->price ?? 0, 2) }}
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-14 reveal">
                    <a href="/shop" class="shop-btn relative inline-block border-[1.5px] border-charcoal px-[52px] py-[14px] text-[0.65rem] font-bold tracking-wide-2 uppercase text-charcoal overflow-hidden transition-colors duration-[350ms] no-underline">
                        <span class="relative z-[1]">View All Products</span>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <section class="bg-[#111110] py-6 min-h-[150px] text-center flex flex-col justify-center rounded-sm">
        <div class="text-white/50 uppercase tracking-[10%] md:tracking-[25%] text-lg font-semibold mb-2">FOLLOW US ON INSTAGRAM</div>
        <div><a href="#" class="text-white text-lg font-semibold tracking-[20%] hover:text-rouge transition-colors duration-300">@saras_creation8</a></div>
    </section>

    <style>
        /* ── Detail Tab Triggers ── */
        .detail-tab-trigger {
            color: rgba(42,42,42,0.35);
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
            transition: color 0.25s, border-color 0.25s;
        }
        .detail-tab-trigger.active,
        .detail-tab-trigger:hover {
            color: #2a2a2a;
            border-bottom-color: #2a2a2a;
        }

        /* ── Gallery Thumb ── */
        .thumb-btn:focus { outline: none; }
        .thumb-btn.active-thumb { border-color: #2a2a2a !important; }

        /* ── Main image swap ── */
        #mainProductImg {
            transition: opacity 0.4s ease, transform 0.6s ease;
        }
        #mainProductImg.img-fade { opacity: 0; transform: scale(1.02); }

        /* ── Zoom lens ── */
        .main-img-wrap:hover img { transform: scale(1.04); }
        .main-img-wrap img { transition: transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94), opacity 0.4s; }

        /* ── Qty input arrows hide ── */
        #qtyInput::-webkit-inner-spin-button,
        #qtyInput::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
        #qtyInput { -moz-appearance: textfield; }

        /* ── Scrollbar hide ── */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* ── Add to Cart button ripple ── */
        #addToCartBtn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: #c0392b;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.45s cubic-bezier(0.76,0,0.24,1);
            z-index: 0;
        }
        #addToCartBtn:hover::before { transform: scaleX(1); transform-origin: left; }

        /* ── Review bar animation ── */
        .review-bar { transition: width 1s cubic-bezier(0.22,1,0.36,1); }

        /* ── Product gallery fade-in ── */
        .product-gallery-wrap { opacity: 0; transform: translateX(-30px); }
        .product-gallery-wrap.animated { opacity: 1; transform: translateX(0); transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.22,1,0.36,1); }

        .product-info-wrap { opacity: 0; transform: translateY(20px); }
        .product-info-wrap.animated { opacity: 1; transform: translateY(0); transition: opacity 0.8s ease 0.15s, transform 0.8s cubic-bezier(0.22,1,0.36,1) 0.15s; }

        /* ── Products grid ── */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }
        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }

        /* ── Product card hover effects ── */
        .product-card-wrap:hover .product-img-primary { opacity: 0; }
        .product-card-wrap:hover .product-img-secondary { opacity: 1; }
        .product-card-wrap:hover .product-overlay { opacity: 1; }
    </style>

    <script>
        /* ── Image Gallery ── */
        function switchMainImg(btn, src) {
            const img = document.getElementById('mainProductImg');
            img.classList.add('img-fade');
            setTimeout(() => {
                img.src = src;
                img.classList.remove('img-fade');
            }, 350);
            document.querySelectorAll('.thumb-btn').forEach(b => b.classList.remove('active-thumb', 'border-charcoal'));
            btn.classList.add('active-thumb', 'border-charcoal');
        }

        /* ── Quantity ── */
        function changeQty(delta) {
            const input = document.getElementById('qtyInput');
            let val = parseInt(input.value) + delta;
            if (val < 1) val = 1;
            if (val > 99) val = 99;
            input.value = val;
        }

        /* ── Wishlist Toggle ── */
        function toggleWish(btn) {
            const icon = btn.querySelector('i');
            if (icon.classList.contains('fa-regular')) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
                icon.style.color = '#c0392b';
            } else {
                icon.classList.remove('fa-solid');
                icon.classList.add('fa-regular');
                icon.style.color = '';
            }
        }

        /* ── Detail Tabs ── */
        function switchDetailTab(id) {
            document.querySelectorAll('.detail-tab-trigger').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.detail-tab-panel').forEach(p => { p.style.display = 'none'; });
            document.getElementById('dtab-' + id).classList.add('active');
            const panel = document.getElementById('dpanel-' + id);
            panel.style.display = '';
            panel.classList.remove('animated');
            void panel.offsetWidth; // force reflow
            panel.classList.add('animated');

            // Animate review bars when reviews tab opens
            if (id === 'reviews') {
                setTimeout(() => {
                    document.querySelectorAll('.review-bar').forEach(bar => {
                        bar.style.width = bar.dataset.w;
                    });
                }, 150);
            }
        }

        /* ── Add to Cart feedback ── */
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartBtn = document.getElementById('addToCartBtn');
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', function () {
                    const btn = this;
                    const original = btn.innerHTML;
                    btn.innerHTML = '<span class="relative z-[1] flex items-center justify-center gap-2"><i class="fas fa-check text-xs"></i> Added!</span>';
                    btn.disabled = true;
                    setTimeout(() => {
                        btn.innerHTML = original;
                        btn.disabled = false;
                    }, 1800);
                });
            }
        });

        /* ── Scroll Reveal for product gallery/info ── */
        (function () {
            const els = document.querySelectorAll('.product-gallery-wrap, .product-info-wrap');
            const io = new IntersectionObserver((entries) => {
                entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('animated'); io.unobserve(e.target); } });
            }, { threshold: 0.1 });
            els.forEach(el => io.observe(el));
        })();

        /* ── Initialise review bars on page load if reviews panel visible ── */
        window.addEventListener('DOMContentLoaded', () => {
            // Trigger reveal animations from layout.app if available
            if (typeof initReveal === 'function') initReveal();
        });
    </script>

@endsection
