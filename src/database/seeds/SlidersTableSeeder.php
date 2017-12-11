<?php

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'id'=>1,
            'title'=>'cafe',
            'url'=>'cafe',
            'is_show'=>true,
            'order'=>1,
            'image'=>'cafe.jpg',
        ]);
        Slider::create([
            'id'=>2,
            'title'=>'trung thu',
            'url'=>'trung-thu',
            'is_show'=>true,
            'order'=>2,
            'image'=>'trung-thu.jpg',
        ]);    
        Slider::create([
            'id'=>3,
            'title'=>'dac san ba mien',
            'url'=>'dac-san-tay-nguyen',
            'is_show'=>true,
            'order'=>3,
            'image'=>'dac-san-tay-nguyen.jpg',
        ]);    

        /* php artisan db:seed --class=SlidersTableSeeder */  
    }
}
