<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $product = Product::findOrFail($request->product_id);

        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->location_description = $user->location_description;
        $order->phone_number = $user->phone_number;
        $order->price = $product->price;
        $order->save();

        return redirect()->route('home')->with('success', 'Order berhasil disimpan!');
    }
}

