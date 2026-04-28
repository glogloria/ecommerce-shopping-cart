<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'street', 'unit_number', 'city', 'state', 'zip'])]
class Address extends Model
{
    
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }


}
