<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Notifications\PasswordResetNotification;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Notifiable, EntrustUserTrait;
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get the products for the user.
     */
     public function posts()
     {
         return $this->hasMany('App\Models\Post');
     }

      /**
     * Get the bookaddresses for the user.
     */
     public function bookaddresses()
     {
         return $this->hasMany('App\Models\BookAddress');
     }

     /**
     * Get the orders for the user.
     */
     public function orders()
     {
         return $this->hasMany('App\Models\Order', 'customer_id');
     }

}
