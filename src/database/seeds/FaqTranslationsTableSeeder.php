<?php

use Illuminate\Database\Seeder;
use App\Models\FaqTranslation;

class FaqTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FaqTranslation::create([
            'id'=>1,
            'faq_id'=>1,
            'language_id'=>1,
            'question'=>'Thịt choá?',
            'answer'=>'Mắm tôm.',
        ]);
        FaqTranslation::create([
            'id'=>2,
            'faq_id'=>1,
            'language_id'=>2,
            'question'=>'Who are you?',
            'answer'=>'We are Poko Farms.',
        ]);
        FaqTranslation::create([
            'id'=>3,
            'faq_id'=>1,
            'language_id'=>3,
            'question'=>'Hao cu su?',
            'answer'=>'Lang lung treo.',
        ]);              

        /* php artisan db:seed --class=FaqTranslationsTableSeeder */         
    }
}
