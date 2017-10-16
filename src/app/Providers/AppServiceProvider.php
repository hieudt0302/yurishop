<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Validator;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //For those running MariaDB or older versions of MySQL:
        //Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
        Schema::defaultStringLength(191);
		
		if(DB::connection()->getDatabaseName()){
			if (Schema::hasTable('categories')) {
				$menu = Category::where('is_menu_avaiable',1)
				->whereNull('parent_id')
				->orderBy('order','asc')
				->get();

				View::share('menus', $menu );
			}
        }
        

        //Custom Validation
        Validator::extend('nospaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // if (config('app.env') == 'local') {
        //     $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        // }
    }
}
