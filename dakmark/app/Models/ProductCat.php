<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    protected $table = 'product_cat';

    public function hasChildCat($cat_id){
    	$childCat = ProductCat::where('parent_id', '<>', 0)->get();
    	if(count($childCat))
    		return true;
    	return false;
    }
    public function getChildCat($cat_id){
    	$childCat = ProductCat::where('parent_id', $cat_id)->get();
    	return $childCat;
    }
}