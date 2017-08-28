<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigator extends Model
{
    protected $table = 'navigator';
    public $timestamps = false;

    public static function hasChildNav($nav_id){
    	$childNav = \DB::table('navigator')->where('parent_id', $nav_id)->count(); 
    	if($childNav > 0)
    		return true;
    	return false;
    }
    public static function getChildNav($nav_id){
    	$childNav = \DB::table('navigator')->where('parent_id', $nav_id)->orderBy('sort_order', 'asc')->get();
    	return $childNav;
    }
}