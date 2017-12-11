<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TranslationScope;

class CategoryTranslation extends Model
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
     * Get the category that owns the category translation.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
