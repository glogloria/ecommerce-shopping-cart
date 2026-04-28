<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

/**
 * Customer facing pages
 */
class HomeController extends Controller
{
    
    public function index() {
        $products = Product::where('quantity', '>', 0)->get();

        return view('customer.home', compact('products'));
    }

}
