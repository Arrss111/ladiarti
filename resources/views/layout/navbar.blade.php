 @extends('layouts.app')

@section('content')  

    <div class="container">
        <a class="navbar-brand fw-bold" href="#">LADIARTI</a>
        <form class="d-flex mx-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="fa fa-camera"></i></button>
        </form>
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary m-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary m-2">Register</a>
    @else
        <a href="{{ route('dashboard') }}" class="btn btn-success m-2">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger m-2">Logout</button>
        </form>
    @endguest
</div>
@endsection