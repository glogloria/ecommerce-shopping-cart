<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\Order;
Use App\Models\OrderItem;

/**
 * Handles order functionality
 */
class CheckoutController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart) {
        $this->cart = $cart;
    }
    
    /**
     * Create order and checkout
     */
    public function checkout() {
        $cart = $this->cart->getUserCart();
        $cartItems = $cart->items()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $cartItems->sum(fn($item) => $item->product->price),
        ]);

        // Create order items
        foreach($cartItems as $cartItem) {
            $product = $cartItem->product;

            // Adjust quantity
            $product->quantity -= 1;
            $product->save();

            // Creat order
            orderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->quantity,
            ]);
        }

        // Clear cart
        $cart->items()->delete();
        
        return redirect()->route('orders.show', $order->id);

    }

}
