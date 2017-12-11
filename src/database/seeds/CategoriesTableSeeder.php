<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //name , description , url,`order`,image_icon
        if (Category::count() == 0) {
            //1
            $category1 = Category::create([
                'name' => 'Blog',                
                'slug' => 'posts',
                'order'         => 0,
                'image_icon'       => '',
                'is_menu_avaiable'=>true,
            ]);
            $categoryTranslation1_a = CategoryTranslation::create([
                'name' => 'Blog VI',
                'category_id' =>  $category1->id,
                'description'          => 'Description',
                'language_id' => 1
            ]);
            $categoryTranslation1_b = CategoryTranslation::create([
                'name' => 'Blog EN',
                'category_id' =>  $category1->id,
                'description'          => 'Description',
                'language_id' => 2
            ]);

            //2
            $category2 =Category::create([
                'name' => 'Shop',                
                'slug' => 'products',
                'order'         => 1,
                'is_menu_avaiable'=>true,
                'image_icon'       => ''
            ]);
            $categoryTranslation2_a = CategoryTranslation::create([
                'name' => 'Shop VI',
                'category_id' =>  $category2->id,
                'description'          => 'Description',
                'language_id' => 1
            ]);
            $categoryTranslation2_b = CategoryTranslation::create([
                'name' => 'Shop EN',
                'category_id' =>  $category2->id,
                'description'          => 'Description',
                'language_id' => 2
            ]);

            //3
            $category3 =Category::create([
                'name' => 'Cà Phê Và Ẩm Thực',                
                'slug' => 'ca-phe-va-am-thuc',
                'order'         => 0,
                'image_icon'       => '',
                'is_menu_avaiable'=>true,
                'parent_id' =>2
            ]);

            $categoryTranslation3_a = CategoryTranslation::create([
                'name' => 'Cà Phê Và Ẩm Thực VI',
                'description'          => 'Description',
                'category_id' =>  $category3->id,
                'language_id' => 1
            ]);
            $categoryTranslation3_b = CategoryTranslation::create([
                'name' => 'Cà Phê Và Ẩm Thực EN',
                'description'          => 'Description',
                'category_id' =>  $category3->id,
                'language_id' => 2
            ]);

            //4
            $category4 =Category::create([
                'name' => 'Cà Phê Và Sức Khỏe',                
                'slug' => 'ca-phe-va-suc-khoe',
                'order'         => 1,
                'image_icon'       => '',
                'is_menu_avaiable'=>true,
                'parent_id' =>2
            ]);

            $categoryTranslation4_a = CategoryTranslation::create([
                'name' => 'Cà Phê Và Sức Khỏe VI',
                'description'          => 'Description',
                'category_id' =>  $category4->id,
                'language_id' => 1
            ]);
            $categoryTranslation4_b = CategoryTranslation::create([
                'name' => 'Cà Phê Và Sức Khỏe EN',
                'description'          => 'Description',
                'category_id' =>  $category4->id,
                'language_id' => 2
            ]);

            //5
            $category5 = Category::create([
                'name' => 'Thế Giới Cà Phê',                
                'slug' => 'the-gioi-ca-phe',
                'order'         => 0,
                'image_icon'       => '',
                'is_menu_avaiable'=>true,
                'parent_id' =>1
            ]);

            $categoryTranslation5_a = CategoryTranslation::create([
                'name' => 'Thế Giới Cà Phê VI',
                'description'          => 'Description',
                'category_id' =>  $category5->id,
                'language_id' => 1
            ]);
            $categoryTranslation5_b = CategoryTranslation::create([
                'name' => 'Thế Giới Cà Phê EN',
                'description'          => 'Description',
                'category_id' =>  $category5->id,
                'language_id' => 2
            ]);

        }
    }
}
