<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Language;

class TranslationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('language_id', Language::where('code',\App::getLocale())->firstOrFail()->id);
    }

    /* HOW TO REMOVE IT*/

    ///TODO: CategoryTranslation::withoutGlobalScopes()->get();
    
    ///TODO: CategoryTranslation::withoutGlobalScopes([FirstScope::class, SecondScope::class])->get();
}