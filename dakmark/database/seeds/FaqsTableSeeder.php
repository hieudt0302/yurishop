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
            'id'=>1
        ]);
        Faq::create([
            'id'=>2
        ]);
        Faq::create([
            'id'=>3
        ]);                

        /* php artisan db:seed --class=FaqTableSeeder */  
    }
}
