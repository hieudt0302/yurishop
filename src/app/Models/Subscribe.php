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

    public static existEmail($email){
    	$exist = DB::table('subscribe')->where('email', $email)->first();
    	if(!empty($exist))
    		return true;
    	return false;
    }
}
