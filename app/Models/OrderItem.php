<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['id', 'cart_item_id', 'order_id'])]
class OrderItem extends Model
{
     /** 
     * Don't require created_at, updated_at attributes
     */
    public $timestamps = false;
        
    public function product() {
        return $this->belongsTo(Product::class);
    }

}
