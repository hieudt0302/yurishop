<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $blog = Blog::firstOrNew(['id' => 1]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cách pha cà phê đúng chuẩn thanh niên cứng',
                    'slug' => 'slug 1',
                    'img' => 'img 1',
                    'content' => 'content 1',
                    'status' => 'status 1',
                    'view_count' => 1,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
        $blog = Blog::firstOrNew(['id' => 2]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cách pha cà phê đúng chuẩn FA',
                    'slug' => 'slug 2',
                    'img' => 'img 2',
                    'content' => 'content 2',
                    'status' => 'status 2',
                    'view_count' => 2,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
        
        $blog = Blog::firstOrNew(['id' => 3]);
        if (!$blog->exists) {
            $blog->fill([
                    'title' => 'Cách pha cà phê đúng chuẩn ông bố của năm',
                    'slug' => 'slug 3',
                    'img' => 'img 3',
                    'content' => 'content 3',
                    'status' => 'status 3',
                    'view_count' => 3,
                    'created_at' => '2017-06-21 06:11:46',
                    'updated_at' => '2017-06-22 06:11:46',
                ])->save();
        }
    }
}
