<?php 

namespace App\Services;
use App\Models\Cart;

class CartService {

    /**
     * Get or create cart
     */
    public function getUserCart() {
        return Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);
    }

}