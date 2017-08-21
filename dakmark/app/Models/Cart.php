<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Cart extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'carts';


     /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
     public static function count()
     {
        if(!Auth::guest())
        {
           return DB::table('carts')->where('user_id',Auth::user()->id)->count();
        }
        else
        {
            return 0;
        }
     }
}
