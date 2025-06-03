<div class="col">
    <div class="card h-100 text-center">
        <img src="{{ asset('images/' . $image) }}" alt="{{ $name }}" class="product-image">
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">Rp {{ number_format($price, 0, ',', '.') }}</p>
            <a href="{{ route('product.show', ['id' => $id]) }}" class="buy-button">Buy</a>
        </div>
    </div>
</div>
