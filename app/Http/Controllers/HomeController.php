<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
            ['image' => 'nike-kyrie.png', 'name' => 'Nike Kyrie', 'price' => 2500000],
            ['image' => 'nike-backpack.png', 'name' => 'Nike Backpack', 'price' => 559000],
            ['image' => 'beads.png', 'name' => 'Beads', 'price' => 5000],
            ['image' => 'tarcktop.png', 'name' => 'Tarcktop', 'price' => 800000],
            ['image' => 'datejust.png', 'name' => 'Datejust 31', 'price' => 265585000],
            ['image' => 'classic-cap.png', 'name' => 'Classic Cap', 'price' => 275000],
        ];

        return view('home', compact('products'));
    }
}
