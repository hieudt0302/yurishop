<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';
     protected $fillable = ['key', 'value'];

    public static function config($key){
    	$config = \DB::table('settings')->where('key', $key)->first();
    	if(!empty($config))
    		return $config->value;
    	return '';
    }
}
