<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    /**
     * Get all of the products that are assigned this tag.
     */
     public function products()
     {
         return $this->morphedByMany('App\Models\Product', 'taggable');
     }
 
     /**
      * Get all of the posts that are assigned this tag.
      */
     public function posts()
     {
         return $this->morphedByMany('App\Models\Post', 'taggable');
     }
}
