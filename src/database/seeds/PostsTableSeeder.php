<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Post::count() == 0) {
            $user = User::where('username', 'admin')->firstOrFail();

            //10
            $post1 = Post::create([
                'title'  => 'Ca phe va bo',
                'slug' => 'post-1',
                'img' => 'test.jpg',                
                'published'       => true,
                'category_id' => 5,
                'author_id' => $user->id
            ]);
        }
    }
}
