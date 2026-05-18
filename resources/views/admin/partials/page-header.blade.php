<div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
    <div>
        <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-2">{{ $eyebrow ?? 'Manage' }}</p>
        <h2 class="font-cormorant text-4xl italic text-charcoal">{{ $title }}</h2>
    </div>
    @isset($actionUrl)
        <a href="{{ $actionUrl }}" class="admin-btn admin-btn-primary">{{ $actionLabel ?? 'Create' }}</a>
    @endisset
</div>
