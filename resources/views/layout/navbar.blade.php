 <!-- Tambahkan ini di HEAD layout utama kamu (misal: app.blade.php atau welcome.blade.php) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- resources/views/layout/navbar.blade.php -->
<nav class="bg-white border-bottom shadow-sm py-2 px-4 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-3">
        <a class="navbar-brand fw-bold text-dark fs-4" href="{{ url('/') }}">LADIARTI</a>

        <!-- SEARCH FORM -->
        <form class="d-flex position-relative" role="search" action="{{ route('search') }}" method="GET">
            <input class="form-control form-control-sm pe-5" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn position-absolute end-0 top-0 bottom-0 border-0 bg-transparent px-2" type="submit">
                <i class="bi bi-search text-secondary"></i>
            </button>
        </form>
    </div>

    <div class="d-flex align-items-center gap-3">
        @php
            $cartCount = session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0;
        @endphp

        <!-- KERANJANG -->
        <a href="{{ route('cart.index') }}" class="text-dark position-relative me-2">
            <i class="bi bi-cart3 fs-5"></i>
            @if ($cartCount > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $cartCount }}
                </span>
            @endif
        </a>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Register</a>
        @else
            <!-- PROFIL -->
            <a href="{{ route('profile.edit') }}" class="text-dark">
                {{ __('Profile') }}
            </a>

            <!-- DASHBOARD & LOGOUT -->
            <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        @endguest
        
    </div>
</nav>
