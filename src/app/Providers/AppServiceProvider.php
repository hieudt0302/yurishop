<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Gallery;
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

                // $footer_galleries = Gallery::where('published', true)->orderBy('updated_at', 'desc')->limit(9)->get();
               
                $latestMediaOfGallery = DB::table('medias')
                ->whereIn('id', DB::Raw('select gm.media_id from gallery_media as gm left join galleries as g on gm.gallery_id = g.id where g.published = 1'))
                ->limit(9)
                ->get();

				View::share(['blog_menu' => $blog_menu, 'product_menu' => $product_menu, 'latestMediaOfGallery' => $latestMediaOfGallery ]);
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
