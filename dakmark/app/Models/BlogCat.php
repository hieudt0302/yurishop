<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCat extends Model
{
    protected $table = 'blog_cat';
    public $timestamps = false;
    
    public static function hasChildCat($cat_id){
    	$childCat = \DB::table('blog_cat')->where('parent_id', $cat_id)->count(); 
    	if($childCat > 0)
    		return true;
    	return false;
    }
    public static function getChildCat($cat_id){
    	$childCat = \DB::table('blog_cat')->where('parent_id', $cat_id)->orderBy('sort_order', 'asc')->get();
    	return $childCat;
    }
}