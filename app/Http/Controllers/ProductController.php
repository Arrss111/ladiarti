<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id); // Ambil data produk berdasarkan ID

        return view('product-detail', compact('product'));
    }
}
