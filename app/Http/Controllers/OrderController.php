<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{

    /**
     * Show all orders
     */
    public function index() {
        $orders = Order::where('user_id', auth()->id())->with('items.product')
            ->orderBy('id', 'asc')
            ->get();

            return view('customer.orders.index', compact('orders'));
    }
    
    /**
     * Show individual order
     */
    public function show(Order $order) {

        return view('customer.orders.show', compact('order'));
    }

}
