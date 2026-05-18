@if(filled($siteSettings->instagram_url))
    @php
        $igPath = trim((string) parse_url($siteSettings->instagram_url, PHP_URL_PATH), '/');
        $igFirst = $igPath !== '' ? explode('/', $igPath)[0] : '';
        $igLabel = $igFirst !== '' ? '@'.ltrim($igFirst, '@') : 'Follow us';
    @endphp
    <section class="bg-[#111110] py-6 min-h-[150px] text-center flex flex-col justify-center rounded-sm">
        <div class="text-white/50 uppercase tracking-[10%] md:tracking-[25%] text-lg font-semibold mb-2">FOLLOW US ON INSTAGRAM</div>
        <div>
            <a href="{{ $siteSettings->instagram_url }}" target="_blank" rel="noopener noreferrer" class="text-white text-lg font-semibold tracking-[20%] hover:text-rouge transition-colors duration-300">{{ $igLabel }}</a>
        </div>
    </section>
@endif
