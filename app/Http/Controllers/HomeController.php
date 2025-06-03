<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Kirim ke view homepage
        return view('home', compact('products'));
    }
}
