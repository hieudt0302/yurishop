<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TranslationScope;

class FaqTranslation extends Model
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
     * Get the infopage that owns the faq translation.
     */
    public function faq()
    {
        return $this->belongsTo('App\Models\Faq');
    }
}
