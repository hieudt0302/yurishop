<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Scope;
use App\Scopes;
use DB;

class Category extends Model
{
    use SoftDeletes;

   /**
     * The table associated with the model.
     *
     * @var string
     */

    public function GetMenuSubLevel1()
    {       
        return Category::where('parent_id', $this->id)
        ->where('is_menu_avaiable', 1)
        ->orderBy('order','asc')
        ->get();
    }


     /**
     * Get the products for the category.
     */
     public function products()
     {
         return $this->hasMany('App\Models\Product');
     }

     public function publishedProducts()
     {
         return $this->products()->where('published','=', 1);
     }       

     public function productsCount()
     {
       return $this->hasOne('App\Models\Product')
         ->selectRaw('category_id, count(*) as aggregate')
         ->groupBy('category_id');
     }

     public function getProductsCountAttribute()
     {
       // if relation is not loaded already, let's do it first
       if ( ! array_key_exists('productsCount', $this->relations)) 
         $this->load('productsCount');
      
       $related = $this->getRelation('productsCount');
      
       // then return the count directly
       return ($related) ? (int) $related->aggregate : 0;
     }


     /**
     * Get the products for the category.
     */
     public function posts()
     {
         return $this->hasMany('App\Models\Post');
     }

     public function publishedPosts()
     {
         return $this->posts()->where('published','=', 1);
     }     

     public function postsCount()
     {
       return $this->hasOne('App\Models\Post')
         ->selectRaw('category_id, count(*) as aggregate')
         ->groupBy('category_id');
     }
     public function getPostsCountAttribute()
     {
       // if relation is not loaded already, let's do it first
       if ( ! array_key_exists('postsCount', $this->relations)) 
         $this->load('postsCount');
      
       $related = $this->getRelation('postsCount');
      
       // then return the count directly
       return ($related) ? (int) $related->aggregate : 0;
     }


     /**
     * Get the category that owns the product.
     */
     public function parent()
     {
         return $this->belongsTo('App\Models\Category');
     }

     /**
     * Get the translations for the category.
     */
    public function translations()
    { 
        /* 
        * It return list but just contain one or none. Because condition of scope has override. 
        * If use ->withoutGlobalScopes(); it wil be remove several or even all of the global scopes
        */ 
        return $this->hasMany('App\Models\CategoryTranslation')->withoutGlobalScopes();
    }

    public function translation()
    {
        /* It hack a bit of translations above */
        return $this->hasOne('App\Models\CategoryTranslation'); //hack relationship
    }

}
