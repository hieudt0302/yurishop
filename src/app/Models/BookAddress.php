<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BookAddress extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'book_addresses';

     /**
     * Get the user that owns the BookAddress.
     */
     public function user()
     {
         return $this->belongsTo('App\Models\user');
     }

      /**
     * Get the products for the category.
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Product');
    }
     
}
