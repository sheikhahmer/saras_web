<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'SARAS CREATIONS')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    @stack('styles')
</head>
<body class="font-raleway bg-warm-white overflow-x-hidden">

@include('partials.header')

@yield('content')

@include('partials.footer')

<button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})" style="display:none; position:fixed; bottom:24px; right:24px; background:#1e1e1e; color:#FAF6F1; width:44px; height:44px; border:none; cursor:pointer; z-index:50; font-size:1rem; box-shadow:0 4px 20px rgba(0,0,0,0.3);">
    <i class="fa fa-angle-up"></i>
</button>

<script src="{{ asset('js/home.js') }}"></script>

@stack('scripts')
</body>
</html>

