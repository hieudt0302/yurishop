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
            'code'=>'vi',
            'name'=>'Tiếng Việt'
        ]);
        Language::create([
            'id'=>2,
            'code'=>'en',
            'name'=>'Tiếng Anh'
        ]);
        Language::create([
            'id'=>3,
            'code'=>'cn',
            'name'=>'Tiếng Trung'
        ]);                
        Language::create([
            'id'=>4,
            'code'=>'ja',
            'name'=>'Tiếng Nhật'
        ]); 

        /* php artisan db:seed --class=LanguageTableSeeder */        
    }
}
