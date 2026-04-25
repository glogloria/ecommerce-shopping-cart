<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    
    /** 
     * Don't require created_at, updated_at attributes
     */
    public $timestamps = false;

    protected $table = 'orders';
    protected $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
