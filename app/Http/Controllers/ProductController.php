<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
{
    $product = Product::findOrFail($id);
    if (is_string($product->image)) {
        $product->image = json_decode($product->image);
    }
    return view('product.detail', compact('product'));
}


}
