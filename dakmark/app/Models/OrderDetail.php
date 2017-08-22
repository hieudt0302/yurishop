<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderDetail extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orderdetails';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
