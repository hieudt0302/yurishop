<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class MenuController extends Controller
{
    public function menu($parent, $slug)
    {
        $search = Input::get('search');
        Input::flashOnly(['search']);
        $category = Category::where('slug', $slug)->firstOrFail();
        $category_id = $category->id;
        
        if ($parent == "products") {

            //RELATED
            $tags = Tag::has('products')->get();
            $comments = Tag::has('products')->get();
            $lastProducts = Product::where('published',1)->take(4)->get(); 

            // GET PRODUCTS
            $results = $category->publishedProducts()
            ->where('products.name', 'LIKE', '%'. $search . '%')
            ->orWhereIn('products.id', function($query) use ($search,$category_id){
                $query->select('product_id')->from('product_translations')
				->leftJoin('products','product_translations.product_id','=','products.id')
				->where('products.category_id', $category_id)
                ->Where('product_translations.name','LIKE', '%'. $search . '%')
				->groupBy('product_id');
            })
            ->paginate(21);  

            return View('front/products/index', compact('results','tags','comments', 'lastProducts','category','parent','slug'))
            ->with('i', ($page??1 - 1) * 21);

        } elseif ($parent == "posts") {

            //RELATED
            $tags = Tag::has('posts')->get();
            $comments = Tag::has('posts')->get();
            $lastPosts = Post::where('published',1)->take(4)->get(); 
            $post_category = Category::where('slug','posts')->firstOrFail();
            $categories = Category::where('parent_id',$post_category->id)->get(); 
            
            // GET POSTS
            $posts = $category->publishedPosts()
            ->where('posts.title', 'LIKE', '%'. $search . '%')
            ->orWhereIn('posts.id', function($query) use ($search){
                $query->select('post_id')->from('post_translations')
                ->Where('title','LIKE', '%'. $search . '%');
            })
            ->paginate(21); 

            $posts = $category->publishedPosts()
            ->where('posts.title', 'LIKE', '%'. $search . '%')
            ->orWhereIn('posts.id', function($query) use ($search,$category_id){
                $query->select('post_id')->from('post_translations')
				->leftJoin('posts','post_translations.post_id','=','posts.id')
				->where('posts.category_id', $category_id)
                ->Where('post_translations.title','LIKE', '%'. $search . '%')
				->groupBy('post_id');
            })
            ->paginate(21);  
            
            return View('front/posts/index', compact('posts', 'lastPosts','tags','comments','post_category','categories','category','parent','slug'))
            ->with('i', ($page??1 - 1) * 21);
        }
    }
}
