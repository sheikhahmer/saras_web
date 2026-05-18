<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SARAS CREATIONS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#FAF6F1',
                        charcoal: '#1e1e1e',
                        rouge: '#d94f4f',
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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body font-raleway min-h-screen flex items-center justify-center p-6 bg-warm-white">
    <div class="w-full max-w-md admin-card p-8 lg:p-10">
        <div class="text-center mb-8">
            <p class="text-[0.55rem] font-bold tracking-[0.25em] uppercase text-rouge mb-2">Saras Creations</p>
            <h1 class="font-cormorant text-4xl italic text-charcoal">Admin Login</h1>
        </div>

        @if($errors->any())
            <div class="admin-alert-error mb-6">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
            @csrf
            <div>
                <label class="admin-label" for="email">Email</label>
                <input class="admin-input" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div>
                <label class="admin-label" for="password">Password</label>
                <input class="admin-input" type="password" name="password" id="password" required>
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" value="1" class="admin-toggle">
                Remember me
            </label>
            <button type="submit" class="admin-btn admin-btn-primary w-full">Sign In</button>
        </form>

        <p class="text-center mt-8">
            <a href="{{ route('home') }}" class="text-[0.65rem] font-bold tracking-[0.14em] uppercase text-gray-500 hover:text-rouge transition-colors">← Back to website</a>
        </p>
    </div>
</body>
</html>
