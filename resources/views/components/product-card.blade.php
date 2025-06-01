<div class="col">
    <div class="card h-100 text-center">
        <img src="{{ asset('images/' . $image) }}" class="card-img-top" alt="{{ $name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">Rp {{ number_format($price, 0, ',', '.') }}</p>
            <button class="btn btn-dark">Buy</button>
        </div>
    </div>
</div>
