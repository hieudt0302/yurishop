<?php

use Illuminate\Database\Seeder;
use App\Models\ProductTranslation;

class ProductTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductTranslation::create([
            'id'=>1,
            'product_id'=>1,
            'language_id'=>1,
            'name' => 'VN Cà phê Socola',           
            'summary'         => 'VI Summary',
            'description'       => 'VI Description',
            'specs' => 'VI Specs'
        ]);
        ProductTranslation::create([
            'id'=>2,
            'product_id'=>1,
            'language_id'=>2,
            'name' => 'EN Cà phê Socola',             
            'summary'         => 'EN Summary',
            'description'       => 'EN Description',
            'specs' => 'EN Specs'
        ]);
        ProductTranslation::create([
            'id'=>3,
            'product_id'=>1,
            'language_id'=>3,
            'name' => 'CN Cà phê Socola',             
            'summary'         => 'CN Summary',
            'description'       => 'CN Description',
            'specs' => 'CN Specs'
        ]);   
                                

        /* php artisan db:seed --class=ProductTranslationsTableSeeder */         
    }
}
