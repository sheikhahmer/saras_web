@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-2">Overview</p>
        <h2 class="font-cormorant text-4xl italic text-charcoal">Dashboard</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6 gap-5 mb-10">
        @foreach([
            ['label' => 'Products', 'count' => $stats['products'], 'route' => 'admin.products.index', 'icon' => 'fa-box'],
            ['label' => 'Categories', 'count' => $stats['categories'], 'route' => 'admin.categories.index', 'icon' => 'fa-tags'],
            ['label' => 'Sliders', 'count' => $stats['sliders'], 'route' => 'admin.sliders.index', 'icon' => 'fa-images'],
            ['label' => 'Banners', 'count' => $stats['banners'], 'route' => 'admin.banners.index', 'icon' => 'fa-flag'],
            ['label' => 'Gallery', 'count' => $stats['gallery'], 'route' => 'admin.gallery-images.index', 'icon' => 'fa-image'],
            ['label' => 'Messages', 'count' => $stats['messages'], 'route' => 'admin.contact-messages.index', 'icon' => 'fa-envelope'],
        ] as $stat)
            <a href="{{ route($stat['route']) }}" class="admin-card admin-stat-card p-6 hover:border-rouge/30 transition-colors block no-underline text-charcoal">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[0.6rem] font-bold tracking-[0.16em] uppercase text-gray-500">{{ $stat['label'] }}</span>
                    <i class="fa {{ $stat['icon'] }} text-rouge"></i>
                </div>
                <h3>{{ $stat['count'] }}</h3>
            </a>
        @endforeach
    </div>

    <div class="admin-card p-6">
        <h3 class="font-cormorant text-2xl mb-4">Quick Actions</h3>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-primary">Add Product</a>
            <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-outline">Add Category</a>
            <a href="{{ route('admin.sliders.create') }}" class="admin-btn admin-btn-outline">Add Slider</a>
            <a href="{{ route('admin.banners.create') }}" class="admin-btn admin-btn-outline">Add Banner</a>
            <a href="{{ route('admin.gallery-images.create') }}" class="admin-btn admin-btn-outline">Add Gallery Image</a>
        </div>
    </div>
@endsection
