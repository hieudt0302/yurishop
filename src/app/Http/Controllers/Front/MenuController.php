<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class MenuController extends Controller
{
    public function menu($parent, $slug)
    {
        if ($parent == "products") {
            $category = Category::where('slug', $slug)->firstOrFail();
            $tags = Tag::has('products')->get();
            $comments = Tag::has('products')->get();
            $lastProducts = Product::where('published',1)->take(4)->get(); ///TODO: move number limit to database setting
            $products = $category->publishedProducts()->paginate(10);  ///TODO: move number limit to database setting
            return View('front/products/index', compact('products','tags','comments', 'lastProducts'));

        } elseif ($parent == "posts") {
            $category = Category::where('slug', $slug)->firstOrFail();
            $tags = Tag::has('posts')->get();
            $comments = Tag::has('posts')->get();
            $lastPosts = Post::where('published',1)->take(4)->get(); ///TODO: move number limit to database setting
            $posts = $category->publishedPosts()->paginate(10);  ///TODO: move number limit to database setting
            $post_category = Category::where('slug','posts')->firstOrFail();
            $categories = Category::where('parent_id',$post_category->id)->get();            
            return View('front/posts/index', compact('posts', 'lastPosts','tags','comments','post_category','categories'));
        }
    }
}
