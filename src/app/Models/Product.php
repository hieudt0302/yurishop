<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model 
{
    /**/
    use SoftDeletes;

   

    /**
     * Get the category that owns the product.
     */
     public function category()
     {
         return $this->belongsTo('App\Models\Category');
     }


     /**
     * Get all of the tags for the product.
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * Get all of the product's likes.
     */
     public function comments()
     {
         return $this->morphMany('App\Models\Comment', 'commentable');
     }

    /**
     * Get the orderdetails for the product.
     */
     public function orderdetails()
     {
         return $this->hasMany('App\Models\OrderDetail');
     }

     

     /**
     * Get the category that owns the product.
     */
     public function author()
     {
         return $this->belongsTo('App\Models\User');
     }

     /*
     * Get the translations for the product.
     */
    public function translations()
    { 
         /* 
        * It return list but just contain one or none. Because condition of scope has override. 
        * If use ->withoutGlobalScopes(); it wil be remove several or even all of the global scopes
        */ 
        return $this->hasMany('App\Models\ProductTranslation')->withoutGlobalScopes();
    }

    public function translation()
    {
        /* It hack a bit of translations above */
        return $this->hasOne('App\Models\ProductTranslation'); //hack relationship
    }

    public function medias()
    {
       return $this->belongsToMany('App\Models\Media', 'product_media')
                        ->withPivot('order');
    }

    public function GetMediaByOrderAsc()
    {
       return $this->medias->sortBy('order')->first(); //sortByDesc()
    }
  
}

