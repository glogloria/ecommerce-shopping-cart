<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Validation\Rules;

class CartController extends Controller
{
    
    /**
     * Get or create cart
     */
    private function getUserCart() {
        return Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);
    }

    /**
     * View cart
     */
    public function index() {
        $cart = $this->getUserCart();

        $items = $cart->items()->with('product')->get();

        return value('cart.index', compact('items'));
    }


    /**
     * Add item to cart
     */
    public function add(Product $product) {
        $cart = $this->getUserCart();

        $exists = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->exists();

        if (! $exists) {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id
            ]);
        }
        
        return back()->with('success', 'Product added to cart');
    }

    /**
     * Remove product from cart
     */
    public function destroy(Product $product) {
        $cart = $this->getUserCart();

        CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->delete();

        return back()->with('success', 'Product removed');
    }

}
