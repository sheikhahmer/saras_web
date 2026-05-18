{{-- Uses $siteSettings from the layouts.app view composer. Pass $variant: footer | contact | inline --}}
@php
    $variant = $variant ?? 'footer';
    $socialItems = [
        ['url' => $siteSettings->instagram_url, 'title' => 'Instagram', 'icon' => 'fab fa-instagram'],
        ['url' => $siteSettings->facebook_url, 'title' => 'Facebook', 'icon' => 'fab fa-facebook-f'],
        ['url' => $siteSettings->pinterest_url, 'title' => 'Pinterest', 'icon' => 'fab fa-pinterest-p'],
        ['url' => $siteSettings->twitter_url, 'title' => 'X', 'icon' => 'fab fa-x-twitter'],
        ['url' => $siteSettings->youtube_url, 'title' => 'YouTube', 'icon' => 'fab fa-youtube'],
        ['url' => $siteSettings->snapchat_url, 'title' => 'Snapchat', 'icon' => 'fab fa-snapchat'],
        ['url' => $siteSettings->tiktok_url, 'title' => 'TikTok', 'icon' => 'fab fa-tiktok'],
    ];
    $socialItems = array_values(array_filter($socialItems, fn ($row) => filled($row['url'])));
@endphp

@if(count($socialItems))
    @if($variant === 'footer')
        <div class="flex flex-wrap gap-2.5 mt-7">
            @foreach($socialItems as $s)
                <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[rgba(250,246,241,0.45)] hover:text-[#FAF6F1] border border-[rgba(250,246,241,0.2)] hover:border-[#d94f4f] transition-all duration-300 no-underline rounded-sm" title="{{ $s['title'] }}"><i class="{{ $s['icon'] }} text-[0.75rem] md:text-sm"></i></a>
            @endforeach
        </div>
    @elseif($variant === 'contact')
        <div class="flex flex-wrap justify-center gap-4 mt-14">
            @foreach($socialItems as $s)
                <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" title="{{ $s['title'] }}" class="w-12 h-12 flex items-center justify-center border border-gray-200 text-gray-500 hover:text-black hover:border-black transition-colors"><i class="{{ $s['icon'] }} text-xl"></i></a>
            @endforeach
        </div>
    @elseif($variant === 'inline')
        @foreach($socialItems as $s)
            <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" title="{{ $s['title'] }}" class="text-charcoal/50 hover:text-rouge transition-colors duration-200 text-sm"><i class="{{ $s['icon'] }}"></i></a>
        @endforeach
    @endif
@endif
