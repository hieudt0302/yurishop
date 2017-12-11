<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * Get the orderdetails for the order.
     */
     public function orderdetails()
     {
         return $this->hasMany('App\Models\OrderDetail');
     }

     /**
     * Get the billingaddress that owns the order.
     */
     public function billingaddress()
     {
         return $this->belongsTo('App\Models\BookAddress','billing_address_id');
     }

     /**
     * Get the shipingaddress that owns the order.
     */
     public function shippingaddress()
     {
         return $this->belongsTo('App\Models\BookAddress','shipping_address_id');
     }

      /**
     * Get the user that owns the order.
     */
     public function user()
     {
         return $this->belongsTo('App\Models\User','customer_id');
     }
}
