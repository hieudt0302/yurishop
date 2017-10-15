<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     /**
     * Get the category that owns the product.
     */
     public function order()
     {
         return $this->belongsTo('App\Models\order');
     }

      /**
     * Get the product that owns the orderdetail.
     */
     public function product()
     {
         return $this->belongsTo('App\Models\Product');
     }

     
}
