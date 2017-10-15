<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Validator;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $tags = Tag::has('posts')->get();
        $comments = Tag::has('posts')->get();
        $lastPosts = Post::take(10)->get(); ///TODO: move number limit to database setting
        $post_group = Post::all()->groupBy('category_id');  ///TODO: move number limit to database setting
        return View('front/posts/index-allcat', compact('post_group','tags','comments', 'lastPosts'));        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $post_category = Category::where('slug','posts')->firstOrFail();
        $categories = Category::where('parent_id',$post_category->id)->get();
        $last_posts = Post::take(10)->get(); ///TODO: move number limit to database setting        
        return View('front/posts/show', compact('post','categories','last_posts','post_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $search_key = $request->input('key'); 
        

        $posts = Post::where('published',1)
        ->whereNull('deleted_at')
        ->where("title", "LIKE", "%$search_key%")
        ->paginate(10);  

        //TODO search multilang

        $tags = Tag::has('posts')->get();
        $comments = Tag::has('posts')->get();
        $lastPosts = Post::take(10)->get(); ///TODO: move number limit to database setting
        $post_category = Category::where('slug','posts')->firstOrFail();
        $categories = Category::where('parent_id',$post_category->id)->get();        
        return view('front/posts/index',compact('posts','search_key','tags','comments', 'lastPosts','categories','post_category')); 
    }    
}
