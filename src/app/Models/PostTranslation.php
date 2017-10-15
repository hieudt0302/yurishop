<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TranslationScope;

class PostTranslation extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new TranslationScope);
    }
    
     /**
     * Get the post that owns the post translation.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
