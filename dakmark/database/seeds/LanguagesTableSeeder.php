<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        Language::create([
            'id'=>1,
            'name'=>'vi'
        ]);
        Language::create([
            'id'=>2,
            'name'=>'en'
        ]);
        Language::create([
            'id'=>3,
            'name'=>'cn'
        ]);                

        /* php artisan db:seed --class=LanguageTableSeeder */        
    }
}
