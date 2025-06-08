<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PaymentController extends Controller
{
    public function show($id)
    {
        $user = Auth::user(); // ambil user yang login
        $product = Product::findOrFail($id); // ambil data produk berdasarkan ID

        return view('payment', compact('user', 'product'));
    }
}
