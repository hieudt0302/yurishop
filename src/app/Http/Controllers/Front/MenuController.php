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
        
        if ($parent == "products") {
            //RELATED
            $category = Category::where('slug', $slug)->firstOrFail();
            $tags = Tag::has('products')->get();
            $comments = Tag::has('products')->get();
            $lastProducts = Product::where('published',1)->take(4)->get(); 
            
            // GET PRODUCTS
            $results = $category->publishedProducts()
            ->join('product_translations','product_translations.product_id','=','products.id')
            ->where(function ($query) use ($search) {
                if (strlen($search) > 0) 
                {
                    $query->where('products.name', 'LIKE','%'. $search . '%')
                    ->orWhere('product_translations.name', 'LIKE','%'. $search . '%');
                    
                }
            })
            ->distinct()
            ->groupBy('products.id')
            ->paginate(21);  

//             $results = Product::where('products.published',1)
//             ->leftJoin('categories','categories.id','=','products.category_id')
//             ->leftJoin('product_translations','product_translations.product_id','=','products.id')
//             ->where('categories.slug', $slug)
//             ->where(function ($query) use ($search) {
//                 if (strlen($search) > 0) 
//                 {
//                     $query->where('products.name', 'LIKE','%'. $search . '%')
//                     ->orWhere('product_translations.name', 'LIKE','%'. $search . '%');
                    
//                 }
//             })
//             ->groupBy('products.id')
//             ->distinct()
//             ->paginate(21);  
// dd($results);
            return View('front/products/index', compact('results','tags','comments', 'lastProducts','category','parent','slug'))
            ->with('i', ($page??1 - 1) * 21);

        } elseif ($parent == "posts") {
            //RELATED
            $category = Category::where('slug', $slug)->firstOrFail();
            $tags = Tag::has('posts')->get();
            $comments = Tag::has('posts')->get();
            $lastPosts = Post::where('published',1)->take(4)->get(); 
            $post_category = Category::where('slug','posts')->firstOrFail();
            $categories = Category::where('parent_id',$post_category->id)->get(); 
            
            // GET POSTS
            $posts = $category->publishedPosts() 
            ->where(function ($query) use ($search) {
                if (strlen($search) > 0) 
                {
                    $query->where('posts.title', 'LIKE','%'. $search . '%');
                }
            })->paginate(21);
            
            return View('front/posts/index', compact('posts', 'lastPosts','tags','comments','post_category','categories','category','parent','slug'))
            ->with('i', ($page??1 - 1) * 21)
            ->withInput();
        }
    }
}
