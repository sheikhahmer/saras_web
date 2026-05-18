<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — SARAS CREATIONS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#FAF6F1',
                        charcoal: '#1e1e1e',
                        rouge: '#d94f4f',
                        sand: '#C9B49A',
                        'warm-white': '#FDFAF7',
                    },
                    fontFamily: {
                        cormorant: ['Cormorant Garamond', 'serif'],
                        raleway: ['Raleway', 'sans-serif'],
                    },
                },
            },
        };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300&family=Raleway:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body font-raleway">
<div class="min-h-screen flex flex-col lg:flex-row">
    <aside class="admin-sidebar w-full lg:w-64 shrink-0 px-6 py-8">
        <a href="{{ route('admin.dashboard') }}" class="block mb-10">
            <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-1">Saras Creations</p>
            <h1 class="font-cormorant text-2xl italic text-cream">Admin Panel</h1>
        </a>
        <nav class="space-y-4 text-[0.65rem] font-bold tracking-[0.14em] uppercase">
            <a href="{{ route('admin.dashboard') }}" class="block {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.products.index') }}" class="block {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Products</a>
            <a href="{{ route('admin.categories.index') }}" class="block {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
            <a href="{{ route('admin.sliders.index') }}" class="block {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">Sliders</a>
            <a href="{{ route('admin.banners.index') }}" class="block {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">Banners</a>
            <a href="{{ route('admin.gallery-images.index') }}" class="block {{ request()->routeIs('admin.gallery-images.*') ? 'active' : '' }}">Gallery</a>
            <a href="{{ route('admin.contact-messages.index') }}" class="block {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">Contact Messages</a>
            <a href="{{ route('admin.site-settings.edit') }}" class="block {{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">Site contact</a>
        </nav>
        <div class="mt-10 pt-8 border-t border-cream/10 space-y-3 text-[0.65rem]">
            <a href="{{ route('home') }}" target="_blank" class="block hover:text-cream"><i class="fa fa-external-link-alt mr-2"></i> View Site</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-left hover:text-rouge transition-colors">
                    <i class="fa fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-6 lg:p-10">
        @if(session('success'))
            <div class="admin-alert-success mb-6">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="admin-alert-error mb-6">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</div>
<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>
