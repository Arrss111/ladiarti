@extends('layout.aa')

@section('content')
<div class="product-detail-container">
  <div class="top-bar">
    <a href="{{ route('home') }}" class="back-button">&lt;</a>
  </div>

  @php
    $images = is_array($product->image) ? $product->image : [];
    $mainImage = $images[0] ?? 'default.png';
  @endphp

  <div class="thumbs">
      @foreach ($images as $image)
          <img src="{{ asset('images/' . $image) }}" class="thumb" onclick="changeImage('{{ asset('images/' . $image) }}')">
      @endforeach
  </div>

  <div class="main-image">
      <img id="mainProductImage" src="{{ asset('images/' . $mainImage) }}">
  </div>

  <div class="product-info">
    <h1>{{ $product->name }}</h1>
    <h3>{{ $product->category }}</h3>
    <p>{{ $product->description }}</p>
    <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <button class="buy-button">Buy</button>
  </div>
</div>

<script>
  function changeImage(imageUrl) {
    document.getElementById('mainProductImage').src = imageUrl;
  }
</script>
@endsection