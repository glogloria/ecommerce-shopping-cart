<?php

namespace App\Http\Controllers;

use App\Models\Product;

// use Illuminate\Http\Request;

/**
 * Admin dashboard controller
 */
class DashboardController extends Controller
{
    public function admin_index() {
        $products = Product::orderBy('id', 'desc')->get();

        return view('admin.dashboard', compact('products'));
    }

}
