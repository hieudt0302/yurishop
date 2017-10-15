<?php

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'id'=>1,
            'question'=>'Thịt choá?'            
        ]);
        /* php artisan db:seed --class=FaqTableSeeder */  
    }
}
