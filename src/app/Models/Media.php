<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    public function products()
    {
       return $this->belongsToMany('App\Models\Product', 'product_media')
                        ->withPivot('order');
    }

    public function galleries()
    {
       return $this->belongsToMany('App\Models\Gallery', 'gallery_media')
                        ->withPivot('order');
    }

    
}
