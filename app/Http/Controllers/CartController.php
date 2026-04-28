<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{

    protected $cart;    
 
    public function __construct(CartService $cart) {
       $this->cart = $cart;
    }

    /**
     * View cart
     */
    public function index() {
        $cart = $this->cart->getUserCart();

        $items = $cart->items()->with('product')->get();

        return view('customer.cart.index', compact('items'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request, Product $product) {
        $cart = $this->cart->getUserCart();

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity,
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price
            ]);
        }
        
        return back()->with('success', 'Product added to cart');
    }

    /**
     * Remove product from cart
     */
    public function destroy(Product $product) {
        $cart = $this->cart->getUserCart();

        CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->delete();

        return back()->with('success', 'Product removed');
    }

}
