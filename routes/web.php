<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
require __DIR__.'/auth.php';

Route::get('/auth', function () {
    return view('auth.auth');
});


// Untuk detail produk

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
});

Route::get('/payment/{id}', [PaymentController::class, 'show'])->name('payment')->middleware(['auth']);

Route::post('/order/store', [OrderController::class, 'store'])->middleware(['auth'])->name('order.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
});
use App\Http\Controllers\CartController;

// Rute untuk menampilkan halaman keranjang
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Rute untuk menambahkan produk ke keranjang
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Rute untuk mengupdate jumlah produk di keranjang
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Rute untuk menghapus produk dari keranjang
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

use Illuminate\Http\Request;

// Rute untuk pencarian
Route::get('/search', function (Request $request) {
    $keyword = $request->input('search');
    // Untuk sekarang, kita redirect balik dengan pesan (sementara aja)
    return redirect()->back()->with('success', "Pencarian untuk: $keyword");
})->name('search');
