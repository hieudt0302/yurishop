<?php

use Illuminate\Database\Seeder;
use App\Models\InfoPageTranslation;

class InfoPageTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoPageTranslation::create([
            'id'=>1,
            'info_page_id'=>1,
            'language_id'=>1,
            'title'=>'Tra hang',            
            'content'=>'Tu di bo va mang hang den showroom cua chung toi.',
        ]);
        InfoPageTranslation::create([
            'id'=>2,
            'info_page_id'=>1,
            'language_id'=>2,
            'title'=>'Return', 
            'content'=>'Just bring to our showroom.',
        ]);
        InfoPageTranslation::create([
            'id'=>3,
            'info_page_id'=>1,
            'language_id'=>3,
            'title'=>'Tra hang', 
            'content'=>'Chu mi nga.',
        ]);   

        InfoPageTranslation::create([
            'id'=>4,
            'info_page_id'=>2,
            'language_id'=>1,
            'title'=>'Phuong thuc mua hang', 
            'content'=>'Den cua hang ma mua.',
        ]);
        InfoPageTranslation::create([
            'id'=>5,
            'info_page_id'=>2,
            'language_id'=>2,
            'title'=>'Purchase flow', 
            'content'=>'Check product here and go to showroom to buy.',
        ]);
        InfoPageTranslation::create([
            'id'=>6,
            'info_page_id'=>2,
            'language_id'=>3,
            'title'=>'Cach mua hang', 
            'content'=>'Chin thien hao ron a.',
        ]); 

        InfoPageTranslation::create([
            'id'=>7,
            'info_page_id'=>3,
            'language_id'=>1,
            'title'=>'Poko Farms', 
            'content'=>'Chung toi da co kinh nghiem.',
        ]);
        InfoPageTranslation::create([
            'id'=>8,
            'info_page_id'=>3,
            'language_id'=>2,
            'title'=>'About us', 
            'content'=>'We shared our best foods.',
        ]);
        InfoPageTranslation::create([
            'id'=>9,
            'info_page_id'=>3,
            'language_id'=>3,
            'title'=>'Ngo ai ni', 
            'content'=>'Tada.',
        ]);   

        InfoPageTranslation::create([
            'id'=>10,
            'info_page_id'=>4,
            'language_id'=>1,
            'title'=>'Chuoi cua hang trung bay', 
            'content'=>'Chung toi da co kinh nghiem.',
        ]);
        InfoPageTranslation::create([
            'id'=>11,
            'info_page_id'=>4,
            'language_id'=>2,
            'title'=>'Showrooms', 
            'content'=>'We shared our best foods.',
        ]);
        InfoPageTranslation::create([
            'id'=>12,
            'info_page_id'=>4,
            'language_id'=>3,
            'title'=>'Xiao ni', 
            'content'=>'Tada.',
        ]);                                    

        /* php artisan db:seed --class=InfoPageTranslationsTableSeeder */         
    }
}
