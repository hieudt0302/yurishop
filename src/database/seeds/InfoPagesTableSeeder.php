<?php

use Illuminate\Database\Seeder;
use App\Models\InfoPage;

class InfoPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoPage::create([
            'id'=>1,
            'title'=>'returns',
            'slug'=>'returns',
        ]);
        InfoPage::create([
            'id'=>2,
            'title'=>'Purchase flow',
            'slug'=>'purchase-flow',
        ]);
        InfoPage::create([
            'id'=>3,
            'title'=>'about',
            'slug'=>'about',
        ]);
        InfoPage::create([
            'id'=>4,
            'title'=>'showrooms',
            'slug'=>'showrooms',
        ]);                      

        /* php artisan db:seed --class=InfoPageTableSeeder */  
    }
}
