<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoPage extends Model
{
    /*
     * Get the translations for the infopage.
     */
    public function translations()
    { 
        /* 
        * It return list but just contain one or none. Because condition of scope has override. 
        * If use ->withoutGlobalScopes(); it wil be remove several or even all of the global scopes
        */ 
        return $this->hasMany('App\Models\InfoPageTranslation')->withoutGlobalScopes();
    }

    public function translation()
    {
        /* It hack a bit of translations above */
        return $this->hasOne('App\Models\InfoPageTranslation'); //hack relationship
    }
}
