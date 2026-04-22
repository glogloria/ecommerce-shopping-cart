<?php

namespace App\Http\Controllers;

use App\Models\Product;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_index() {
        $products = Product::orderBy('id', 'desc')->get();

        return view('admin.dashboard', compact('products'));
    }

    public function customer_index() {
        $products = Product::orderBy('id', 'desc')->get();

        return view('index', compact('products'));
    }
}
