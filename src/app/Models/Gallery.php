<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model 
{
    
    /**
     * Get the category that owns the product.
     */
     public function category()
     {
         return $this->belongsTo('App\Models\Category');
     }

    public function medias()
    {
       return $this->belongsToMany('App\Models\Media', 'gallery_media')
                        ->withPivot('order');
    }
}

