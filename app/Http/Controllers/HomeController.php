<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
            ->with('distillery')
            ->latest()
            ->take(3)
            ->get();

        $newProducts = Product::latest()
            ->with('distillery')
            ->take(5)
            ->get();

        return view('home', compact('featuredProducts', 'newProducts'));
    }
}
