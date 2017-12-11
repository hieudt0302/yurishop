<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Subscribe extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscribe';

    public static function existEmail($email){
    	$exist = DB::table('subscribe')->where('email', $email)->count();
    	if($exist >0)
    		return true;
    	return false;
    }
}
