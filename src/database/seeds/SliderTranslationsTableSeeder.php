<?php

use Illuminate\Database\Seeder;
use App\Models\SliderTranslation;

class SliderTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SliderTranslation::create([
            'id'=>1,
            'slider_id'=>1,
            'language_id'=>1,
            'description'=>'Ca phe thuan ca phe',
        ]);
        SliderTranslation::create([
            'id'=>2,
            'slider_id'=>1,
            'language_id'=>2,
            'description'=>'Pure coffee.',
        ]);
        SliderTranslation::create([
            'id'=>3,
            'slider_id'=>1,
            'language_id'=>3,
            'description'=>'Ni sua ma.',
        ]);   

        SliderTranslation::create([
            'id'=>4,
            'slider_id'=>2,
            'language_id'=>1,
            'description'=>'Quan di ganh lo mam co trung thu.',
        ]);
        SliderTranslation::create([
            'id'=>5,
            'slider_id'=>2,
            'language_id'=>2,
            'description'=>'Worry-free preparing moon cake.',
        ]);
        SliderTranslation::create([
            'id'=>6,
            'slider_id'=>2,
            'language_id'=>3,
            'description'=>'Chin thien hao ron a.',
        ]);   


        SliderTranslation::create([
            'id'=>7,
            'slider_id'=>3,
            'language_id'=>1,
            'description'=>'Huong vi tay nguyen',
        ]);
        SliderTranslation::create([
            'id'=>8,
            'slider_id'=>3,
            'language_id'=>2,
            'description'=>'Travel to hinghland by the taste.',
        ]);
        SliderTranslation::create([
            'id'=>9,
            'slider_id'=>3,
            'language_id'=>3,
            'description'=>'Chin thien hao lon a.',
        ]);                            

        /* php artisan db:seed --class=SliderTranslationsTableSeeder */         
    }
}
