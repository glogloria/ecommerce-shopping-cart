<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Product;

class CartItem extends Model
{
    /** 
     * Don't require created_at, updated_at attributes
     */
    public $timestamps = false;

    protected $fillable = ['cart_id', 'product_id'];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
