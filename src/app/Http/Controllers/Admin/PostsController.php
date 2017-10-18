<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Language;
use Validator;
use App\Models\Comment;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return View('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $languages = Language::all();
        $blogCategory = Category::where('slug','posts')->firstOrFail();
        $categories = Category::where('parent_id',$blogCategory->id)->get();              
        return View('admin.posts.create',compact('languages','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('message', 'ERROR-INPUT: Code EI1002')
            ->with('status', 'danger')
            ->withInput();
        }

            $post = new Post();
            $post->title = $request->title;
            $post->slug = $request->slug;
            if(!empty($request->category_id))
                $post->category_id = $request->category_id;
            $post->author_id = Auth::user()->id;
            $post->published = $request->published??0;

            $post->img = '' ;
            if (request()->hasFile('img')) {
                $image = $request->file('img');
                $img_path = $image->storeAs('images/blog',$image->getClientOriginalName());                              
                $img = Image::make(Storage::get($img_path))->fit(370, 230)->encode();
                Storage::put($img_path, $img);                     
                $post->img = $image->getClientOriginalName();

                $img_path = $image->storeAs('images/blog/preview',$image->getClientOriginalName());                              
                $img = Image::make(Storage::get($img_path))->fit(80, 100)->encode();
                Storage::put($img_path, $img);                         
            }

            $post->save();            

            // $language_list = Language::all();
            // foreach ($language_list as $language){ 
            //     $post_translation = new PostTranslation;
            //     $post_translation->post_id = $post->id;
            //     $post_translation->language_id = $language->id;
            //     $post_translation->title = $request->input($language->id.'-title');            
            //     $post_translation->content = $request->input($language->id.'-content');
            //     $post_translation->excerpt = $request->input($language->id.'-excerpt');
            //     $post_translation->description = $request->input($language->id.'-description');                                   
            //     $post_translation->save();
            // }    
        
        // return redirect()->back()
        // ->with('success_message', 'Bài viết mới đã được tạo');
        return redirect()->action(
            'Admin\PostsController@edit', ['id' => $post->id]
        );
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = Post::where('id',$id)->firstOrFail();
        // $language_list = Language::all();
        // $post_translations = $post->translations()->get();       
        // return View('admin.posts.edit',compact('post','post_translations','language_list','categories'));

        $post = Post::find($id);
        $languages = Language::all();
        $blogCategory = Category::where('slug','posts')->firstOrFail();
        $categories = Category::where('parent_id',$blogCategory->id)->get();               
        return View('admin.posts.edit',compact('post','languages','categories'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('message', 'ERROR-INPUT: Code EI1002')
            ->with('status', 'danger')
            ->withInput();
        }

        $post = Post::find($id);
        
        $post->title = $request->title;
        $post->slug = $request->slug;
        if(!empty($request->category_id))
            $post->category_id = $request->category_id;

        $post->author_id = Auth::user()->id;
        $post->published = $request->published??0;
        
        if (request()->hasFile('img')) {
            $image = $request->file('img');
            $img_path = $image->storeAs('images/blog',$image->getClientOriginalName());                              
            $img = Image::make(Storage::get($img_path))->fit(370, 230)->encode();
            Storage::put($img_path, $img);                     
            $post->img = $image->getClientOriginalName();

            $img_path = $image->storeAs('images/blog/preview',$image->getClientOriginalName());                              
            $img = Image::make(Storage::get($img_path))->fit(80, 100)->encode();
            Storage::put($img_path, $img);                         
        }

        $post->save();


        // $language_list = Language::all();
        // foreach ($language_list as $language){
        //     $post_tran_id=$request->input($language->id.'-id');
        //     $post_translation = PostTranslation::find($post_tran_id);
        //     if ($post_translation == null) {
        //         $post_translation = new PostTranslation;
        //         $post_translation->post_id = $post->id;                
        //         $post_translation->language_id = $language->id;                
        //     }
        //     $post_translation->title = $request->input($language->id.'-title');            
        //     $post_translation->content = $request->input($language->id.'-content');
        //     $post_translation->excerpt = $request->input($language->id.'-excerpt');
        //     $post_translation->description = $request->input($language->id.'-description');                                   
        //     $post_translation->save();
        // }

    //     return redirect()->back()
    //     ->with('success_message', 'Bài viết đã được cập nhật');
            return redirect()->back()
            ->with('message', 'Bài viết đã được cập nhật')
            ->with('status', 'success')
            ->withInput();
    }

    public function updateTranslation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('message', 'ERROR-INPUT: Code EI1001')
            ->with('status', 'danger')
            ->withInput();
        }

        $translation = PostTranslation::where('post_id', $id)
        ->where('language_id', $request->language_id)->withoutGlobalScopes()
        ->first();
        if(!empty($translation)){
            $translation->title = $request->title_translate??'';
            $translation->excerpt = $request->excerpt_translate??'';
            $translation->content = $request->content_translate??'';
            $translation->description = $request->description_translate??'';
            $translation->save();
        }
        else{

            $postTranslation = new PostTranslation();
            $postTranslation->title = $request->title_translate??'';
            $postTranslation->excerpt = $request->excerpt_translate??'';
            $postTranslation->content = $request->content_translate??'';
            $postTranslation->description = $request->description_translate??'';
            $postTranslation->language_id = $request->language_id;
            $postTranslation->post_id = $id;

            $postTranslation->save();

        }
        // var_dump($postTranslation); die();
        
        return redirect()->back()
        ->with('message', 'Cập nhật nội dung mới thành công')
        ->with('status', 'success')
        ->withInput();
    }

    public function fetchTranslation($id, $code)
    {
        $translation = PostTranslation::where('language_id',$code)
        ->where('post_id',$id)->withoutGlobalScopes()
        ->first();

        $id = 0;
        $title = "";
        $content = "";
        $description = "";
        $excerpt = "";

        if(!empty($translation))
        {
            $id =  $translation->id;
            $title =  $translation ->title;
            $content =  $translation ->content;
            $description =  $translation ->description;
            $excerpt =  $translation ->excerpt;
        }
        return response()->json([
            'message' => 'OK',
            'id' => $id,
            'title'=> $title,
            'content' =>$content,
            'description' =>$description,
            'excerpt' => $excerpt
        ]);
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('success_message', "Xóa thành công!");        
        return redirect()->route('admin.posts.index'); 
    }

    public function categories(Request $request)
    {
        $categories = Category::all();
        return View('admin/posts/categories',compact('categories'));
    }

    public function comments(Request $request)
    {
        $comments = Comment::where('commentable_type','App\Models\Post')->get();
        return View('admin/posts/comments',compact('comments'));
    }
}
