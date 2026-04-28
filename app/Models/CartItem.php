<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;

#[Fillable(['cart_id', 'product_id', 'price', 'quantity'])]
class CartItem extends Model
{
    /** 
     * Don't require created_at, updated_at attributes
     */
    public $timestamps = false;


    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
