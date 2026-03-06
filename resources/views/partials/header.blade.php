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

            <li><a href="{{ route('category') }}" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge"> Shop</a></li>
            <li><a href="{{route('home')}}" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Blogs</a></li>
            <li><a href="{{route('aboutUs')}}" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">About Us</a></li>
            <li><a href="{{route('contactUs')}}" class="nav-link text-[0.65rem] font-bold tracking-wide-4 uppercase text-charcoal relative pb-[3px] transition-colors duration-300 hover:text-rouge">Contact</a></li>
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

