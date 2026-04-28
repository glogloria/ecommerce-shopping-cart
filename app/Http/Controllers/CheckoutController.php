<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Support\Facades\DB;
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

        // Calculate cart total
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->price * $cartItem->quantity;
        }

        // Prepared statements
        $orderId = DB::selectOne(
            "INSERT INTO orders (user_id, total) 
                VALUES(?, ?) RETURNING id",
                [
                    auth()->id(),
                    $total,
                ]
        )->id;

        foreach ($cartItems as $cartItem) {
            DB::insert(
                "INSERT INTO order_items (order_id, product_id, price, quantity)
                VALUES (?, ?, ?, ?)",
                [
                    $orderId,
                    $cartItem->product_id,
                    $cartItem->price,
                    $cartItem->quantity,
                ]
            );

            DB::update(
                "UPDATE products SET quantity = quantity - ? WHERE id = ?",
                [
                    $cartItem->quantity,
                    $cartItem->product_id,
                ]
            );
        }

        // Clear cart
        DB::delete(
            "DELETE FROM cart_items WHERE cart_id = ?",
            [
                $cart->id
            ]
        );
      

        return redirect()->route('orders.show', $orderId);

    }

}
