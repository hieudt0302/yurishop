<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get all of the owning likeable models.
     */
     public function commentable()
     {
         return $this->morphTo();
     }

     public function author()
     {
         return $this->belongsTo('User');
     }

    public function product() 
    {
        return $this->hasOne('App\Models\Product','id', 'commentable_id');
    }

    public function post() 
    {
        return $this->hasOne('App\Models\Post','id', 'commentable_id');
    }
    
}
