<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Ladiarti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/js/app.js')
</head>
<body>
    {{-- Navbar --}}
    @include('layout.navbar')

    <div class="bg-primary text-white text-center py-2 mb-4">
        <h2>Ladiarti</h2>
    </div>

    <div class="container">
        <h3 class="mb-4">Shopping Cart</h3>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tabel isi keranjang --}}
        @php
            $totalHarga = 0;
            $totalProduk = 0;
        @endphp

        @if (!empty($cart) && count($cart) > 0)
            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        @php
                            $subTotal = $item['price'] * $item['quantity'];
                            $totalHarga += $subTotal;
                            $totalProduk += $item['quantity'];
                        @endphp
                        <tr>
                            <td class="d-flex align-items-center gap-2">
                                <img src="{{ asset('images/' . $item['image']) }}" width="60" alt="gambar produk">
                                {{ $item['name'] }}
                            </td>
                            <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control form-control-sm w-50 me-2" min="1">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($subTotal, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Ringkasan --}}
            <div class="text-end">
                <p><strong>Total Produk:</strong> {{ $totalProduk }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
                <p><strong>Biaya Pengiriman:</strong> Rp {{ number_format(15000, 0, ',', '.') }}</p>
                <h5><strong>Total Bayar:</strong> Rp {{ number_format($totalHarga + 15000, 0, ',', '.') }}</h5>
                <a href="{{ route('payment', 1) }}" class="btn btn-success mt-3">Lanjut ke Pembayaran</a>
            </div>
        @else
            <p class="text-center mt-5">Keranjang belanja kosong.</p>
        @endif
    </div>

    <footer class="text-center py-3 bg-light mt-5">
        <p>Create By Ladiarti</p>
    </footer>
</body>
</html>
