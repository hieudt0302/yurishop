<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
     /**
     * Get the category that owns the product.
     */
     public function order()
     {
         return $this->belongsTo('App\Models\order');
     }

}
