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
                $blogCategory = Category::where('slug','posts')->first();

				$blog_menu = Category::where('is_menu_avaiable',1)
                ->where('parent_id',$blogCategory->id??0)
				->orderBy('order','asc')
				->get();

                $product_menu = Category::where('slug','products')->first();                

				View::share(['blog_menu' => $blog_menu, 'product_menu' => $product_menu ]);
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
