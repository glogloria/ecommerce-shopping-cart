<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id', 'cart_item_id'])]
class OrderItem extends Model
{
     /** 
     * Don't require created_at, updated_at attributes
     */
    public $timestamps = false;

    protected $table = 'order_item';
    protected $guarded = [];

    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
