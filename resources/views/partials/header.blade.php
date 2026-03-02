@php
    $headerCategories = [
        ['key'=>'all',   'label'=>'All Products', 'count'=>12],
        ['key'=>'wall',  'label'=>'Wall Hangings', 'count'=>3],
        ['key'=>'plant', 'label'=>'Plant Hangers', 'count'=>3],
        ['key'=>'cord',  'label'=>'Cotton Cords',  'count'=>2],
        ['key'=>'boho',  'label'=>'Boho Decor',    'count'=>3],
        ['key'=>'sale',  'label'=>'On Sale',       'count'=>5],
    ];
@endphp

<nav class="absolute top-0 left-0 right-0 z-[200] px-6 lg:px-[60px] py-6" style="background:rgba(250,246,241,0.22);backdrop-filter:blur(10px)">
    <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" class="font-cormorant text-[1.8rem] font-bold tracking-[-0.02em] text-charcoal no-underline">
            Sara's<span class="text-rouge">.</span>
        </a>

        <ul class="hidden lg:flex gap-11 list-none items-center">
            <li>
                <a href="{{ route('home') }}"
                   class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">
                    Home
                </a>
            </li>

            {{-- Shop with dropdown, available on all pages --}}
            <li class="nav-item relative">
                <a href="{{ route('category') }}"
                   class="nav-link relative flex items-center gap-[5px] pb-[3px] text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal no-underline transition-colors duration-[250ms] whitespace-nowrap">
                    Shop
                    <i class="fas fa-chevron-down caret text-[0.45rem] opacity-50 mt-[1px] transition-transform duration-300"></i>
                </a>
                <div class="nav-dropdown">
                    <div class="p-[28px_24px] border-r border-[rgba(30,30,30,0.06)]">
                        <p class="text-[0.52rem] font-extrabold tracking-[0.3em] uppercase text-rouge mb-4 pb-[10px] border-b border-[rgba(30,30,30,0.07)]">
                            Categories
                        </p>
                        @foreach($headerCategories as $cat)
                            @if($loop->index < 4)
                                <a href="{{ route('category', ['cat' => $cat['key']]) }}"
                                   class="dropdown-link flex items-center justify-between py-2 text-[0.68rem] font-semibold tracking-[0.06em] text-[rgba(30,30,30,0.65)] no-underline border-b border-[rgba(30,30,30,0.04)] last:border-b-0">
                                    {{ $cat['label'] }}
                                    <span class="text-[0.52rem] font-bold text-[rgba(30,30,30,0.22)]">{{ $cat['count'] }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <div class="p-[28px_24px] border-r border-[rgba(30,30,30,0.06)]">
                        <p class="text-[0.52rem] font-extrabold tracking-[0.3em] uppercase text-rouge mb-4 pb-[10px] border-b border-[rgba(30,30,30,0.07)]">
                            More
                        </p>
                        @foreach($headerCategories as $cat)
                            @if($loop->index >= 4)
                                <a href="{{ route('category', ['cat' => $cat['key']]) }}"
                                   class="dropdown-link flex items-center justify-between py-2 text-[0.68rem] font-semibold tracking-[0.06em] text-[rgba(30,30,30,0.65)] no-underline border-b border-[rgba(30,30,30,0.04)] last:border-b-0">
                                    {{ $cat['label'] }}
                                    <span class="text-[0.52rem] font-bold text-[rgba(30,30,30,0.22)]">{{ $cat['count'] }}</span>
                                </a>
                            @endif
                        @endforeach
                        <a href="{{ route('category') }}" class="dropdown-link flex items-center justify-between py-2 text-[0.68rem] font-semibold mt-3 text-rouge no-underline">
                            New Arrivals →
                        </a>
                    </div>

                    <div class="p-[28px_24px] bg-cream flex flex-col justify-center gap-[10px]">
                        <p class="text-[0.52rem] font-extrabold tracking-[0.3em] uppercase text-rouge">✦ Featured</p>
                        <p class="font-cormorant text-[1.3rem] font-semibold italic text-charcoal leading-[1.25]">2026<br/>Collection</p>
                        <p class="text-[0.68rem] text-[rgba(30,30,30,0.42)] leading-[1.6]">Explore our latest handcrafted pieces — made with love.</p>
                        <a href="{{ route('category') }}" class="dropdown-featured-cta relative inline-block mt-1 text-[0.58rem] font-bold tracking-[0.18em] uppercase text-charcoal no-underline pb-[2px]">
                            Shop Now →
                        </a>
                    </div>
                </div>
            </li>

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
        <a href="{{ route('home') }}" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Home</a>
        <a href="{{ route('category') }}" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Shop</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Blogs</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">About Us</a>
        <a href="#" class="py-[0.6rem] text-[0.65rem] font-bold tracking-[0.2em] uppercase text-charcoal">Contact</a>
    </div>
</nav>

