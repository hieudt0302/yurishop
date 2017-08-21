<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class Order extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    // public function user()
    // {
    //     return $this->hasOne('App\Models\User','id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
     public static function countnew()
     {
        return DB::table('orders')->where('status','1')->count(); // Đang chờ xử lý => New
     }

      /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
     public static function countwork()
     {
        return DB::table('orders')->where('status','2')->count(); // Đang chờ xử lý => Work
     }

      public function getTotalOrderPrice() {
        $totalOrderPrice = $this->totalamount + $this->freight1 + $this->freight2 + $this->service;
        return number_format($totalOrderPrice, 2, ',', '.');
      }

      public function getTotalFinalPrice() {
        return $this->buyDetails()->sum(DB::raw('deposit'));
      }
}
