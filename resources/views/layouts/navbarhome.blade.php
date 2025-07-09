<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">

    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="d-flex justify-content-between align-items-center py-3">

                <!-- Left: Logo -->
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold me-4" href="#">LADIARTI</a>

                    <!-- Search -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                <!-- Right: Cart + Auth Buttons -->
                <div class="d-flex align-items-center">

                    <!-- Cart Icon -->
                    @php
                        $cartCount = session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0;
                    @endphp

                    <a href="{{ route('cart.index') }}" class="position-relative text-dark me-3">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                        @if ($cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Auth Buttons -->
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary me-2">Register</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn btn-success me-2">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger me-2">Logout</button>
                        </form>
                    @endguest
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                </div>
                
            </div>
            
        </div>
    </nav>

</body>
</html>
