@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', 'Gallery — Sara\'s Creations')

@section('content')

{{-- Hero — aligned with Shop / category theme --}}
<div class="page-hero relative px-6 lg:px-[60px] pt-[140px] pb-14 lg:pb-16 overflow-hidden bg-no-repeat bg-cover bg-center" style="background-image:url({{ asset('img/slider1.jpg') }})">
    <div class="absolute inset-0 bg-charcoal/50"></div>
    <div class="relative z-10">
        <div class="flex items-center gap-[10px] mb-[22px] text-[0.65rem] font-bold tracking-wide-4 uppercase text-[rgba(250,246,241,0.45)]">
            <a href="{{ route('home') }}" class="text-[rgba(250,246,241,0.55)] no-underline hover:text-rouge transition-colors duration-[250ms]">Home</a>
            <span class="text-[rgba(250,246,241,0.2)]">›</span>
            <span class="text-rouge">Gallery</span>
        </div>
        <h1 class="font-cormorant font-bold italic text-cream leading-none mb-3 text-[clamp(2.5rem,6vw,4.5rem)]">Gallery</h1>
        <p class="font-raleway text-[0.75rem] font-normal tracking-wide text-[rgba(250,246,241,0.65)] max-w-xl leading-relaxed">
            A glimpse of our macramé, cotton cords, and handcrafted pieces — the same warmth and detail you’ll find in every Sara's Creations design.
        </p>
        <div class="mt-6 flex flex-wrap items-center gap-[18px] text-[0.58rem] font-bold tracking-wide-3 uppercase text-[rgba(250,246,241,0.35)]">
            <span>Handmade</span>
            <div class="w-[3px] h-[3px] rounded-full bg-rouge shrink-0"></div>
            <span>Natural materials</span>
            <div class="w-[3px] h-[3px] rounded-full bg-rouge shrink-0"></div>
            <span>Artisan detail</span>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-[3px] z-10" style="background:linear-gradient(90deg,#d94f4f,#E8C9B8,#C9B49A,#d94f4f)"></div>
</div>

<section class="bg-warm-white py-14 lg:py-20 px-6 lg:px-[60px]" id="gallery">
    @if($galleryItems->isEmpty())
        <div class="max-w-2xl mx-auto text-center py-16">
            <p class="text-[0.65rem] font-bold tracking-[0.25em] uppercase text-rouge mb-3">Gallery</p>
            <h2 class="font-cormorant text-3xl italic text-charcoal mb-4">Images coming soon</h2>
            <p class="text-sm text-gray-500">Photos are managed from the admin panel. Sign in and open <strong class="text-charcoal">Gallery</strong> to upload images.</p>
        </div>
    @else
        <div class="heading-wrap reveal mb-12 flex flex-col items-center text-center gap-3 max-w-3xl mx-auto">
            <p class="text-[0.55rem] font-bold tracking-ultra uppercase text-rouge">Our work</p>
            <h2 class="font-cormorant font-bold italic text-charcoal leading-none" style="font-size:clamp(2rem,4vw,3.2rem)">Moments &amp; making</h2>
            <div class="section-heading-line h-px bg-sand mt-1"></div>
        </div>

        <div class="gallery-grid max-w-[1400px] mx-auto">
            @foreach($galleryItems as $item)
                <figure class="gallery-card reveal group relative overflow-hidden bg-cream border border-charcoal/[0.08] shadow-sm">
                    <button type="button"
                            class="gallery-lightbox-trigger w-full cursor-zoom-in border-0 bg-transparent p-0 text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-rouge focus-visible:ring-offset-2 ring-offset-warm-white"
                            data-gallery-src="{{ Storage::url($item->image) }}"
                            data-gallery-alt="{{ $item->display_caption }}"
                            aria-label="View larger: {{ $item->display_caption }}">
                        <span class="block relative overflow-hidden" style="padding-bottom:118%">
                            <img src="{{ Storage::url($item->image) }}"
                                 alt="{{ $item->display_caption }}"
                                 loading="lazy"
                                 class="gallery-img absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                 decoding="async">
                        </span>
                        <figcaption class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-charcoal/80 via-charcoal/20 to-transparent translate-y-full group-hover:translate-y-0 transition-transform duration-[400ms] ease-out pointer-events-none">
                            <span class="text-[0.6rem] font-bold tracking-wide-3 uppercase text-cream">{{ $item->display_caption }}</span>
                        </figcaption>
                    </button>
                </figure>
            @endforeach
        </div>

        @if($galleryItems->hasPages())
            <div class="gallery-pagination-wrapper max-w-[1400px] mx-auto mt-14">
                {{ $galleryItems->links() }}
            </div>
        @endif
    @endif
</section>

{{-- Lightweight lightbox (theme-matched) --}}
<div id="galleryLightbox" class="gallery-lightbox hidden fixed inset-0 z-[8000] flex items-center justify-center p-4 md:p-10" role="dialog" aria-modal="true" aria-label="Image preview">
    <button type="button" class="gallery-lightbox-close absolute top-4 right-4 md:top-8 md:right-8 w-12 h-12 border border-cream/30 bg-charcoal/60 text-cream hover:bg-rouge hover:border-rouge transition-colors z-10" aria-label="Close preview">
        <i class="fas fa-times"></i>
    </button>
    <div class="gallery-lightbox-backdrop absolute inset-0 bg-charcoal/90 backdrop-blur-sm"></div>
    <div class="relative z-[1] max-w-[min(92vw,1100px)] max-h-[88vh]">
        <img id="galleryLightboxImg" src="" alt="" class="max-w-full max-h-[88vh] w-auto h-auto object-contain shadow-2xl border border-charcoal/20 rounded-sm mx-auto">
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const root = document.getElementById('galleryLightbox');
    const img = document.getElementById('galleryLightboxImg');
    const backdrop = root?.querySelector('.gallery-lightbox-backdrop');
    const closeBtn = root?.querySelector('.gallery-lightbox-close');
    if (!root || !img) return;

    const open = (src, alt) => {
        img.src = src;
        img.alt = alt || '';
        root.classList.remove('hidden');
        document.documentElement.style.overflow = 'hidden';
    };

    const close = () => {
        root.classList.add('hidden');
        img.removeAttribute('src');
        img.alt = '';
        document.documentElement.style.overflow = '';
    };

    document.querySelectorAll('.gallery-lightbox-trigger').forEach(btn => {
        btn.addEventListener('click', () => open(btn.dataset.gallerySrc, btn.dataset.galleryAlt || ''));
    });

    backdrop?.addEventListener('click', close);
    closeBtn?.addEventListener('click', close);
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && !root.classList.contains('hidden')) close();
    });
});
</script>
@endpush
