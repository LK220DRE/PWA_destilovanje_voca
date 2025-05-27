<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->take(10)->get(); // ili prilagodi po potrebi
        return view('dashboard', compact('orders'));
    }
}
