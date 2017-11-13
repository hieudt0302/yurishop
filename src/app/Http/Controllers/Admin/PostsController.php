<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $posts = Post::paginate(21);

        return View('admin.posts.index',compact('posts'))
        ->with('i', (Input::get('page', 1) - 1) * 21);
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
        
        $tags = Tag::all();
        return View('admin.posts.create',compact('languages','categories','tags'));
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
            'slug' => 'required|string|min:5',
            'img' => 'image'            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $post = new Post();


        $post->title = $request->title;
        $post->slug = $request->slug;
        if(!empty($request->category_id))
            $post->category_id = $request->category_id;
        $post->author_id = Auth::user()->id;
        $post->published = $request->published??0;


        $post->img = '';
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

        /* Make new tags */
        $this->SelectTags($post, $request->tagIds);

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
        $post = Post::find($id);
        if(empty($post))
        {
            return redirect()->route('admin.posts.index')
            ->with('message', 'Bài viết không tồn tại trên hệ thống')
            ->with('status', 'danger');
        }
        $languages = Language::all();
        $blogCategory = Category::where('slug','posts')->firstOrFail();
        $categories = Category::where('parent_id',$blogCategory->id)->get();  
        
        $language_id = Input::get('language_id')??0;
        $tab = 1;
        $translation =  null;
        if(!empty( $language_id) &&   $language_id  > 0 ){
            $translation = PostTranslation::where('post_id',$id)->where('language_id', $language_id)->withoutGlobalScopes()->first();
            $tab= 2;
        }
        $tags = Tag::all();
        return View('admin.posts.edit',compact('post','languages','categories', 'translation','tab', 'language_id','tags'));
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
            'slug' => 'required|string|min:5',
            'img' => 'image'    
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
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

            if(!empty($post->img)){
                Storage::delete('images/blog/'.$post->img);
                Storage::delete('images/blog/preview'.$post->img);
                $post->img = '';                
            }

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
        
        /* Make new tags */
        $this->SelectTags($post, $request->tagIds);

        return redirect()->back()
        ->with('message', 'Bài viết đã được cập nhật')
        ->with('status', 'success')
        ->withInput(['tab'=> 1]);
    }

    public function updateTranslation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if(empty(Language::find($request->language_id))){
            return redirect()->back()
            ->with('message', 'Vui lòng chọn ngôn ngữ.')
            ->with('status', 'error')
            ->withInput(['tab'=> 2]);
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
        
        return redirect()->back()
        ->with('message', 'Cập nhật nội dung mới thành công')
        ->with('status', 'success')
        ->withInput(['tab'=> 2]);
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
        if(!empty($post->img)){
            Storage::delete('images/blog/'.$post->img);
            Storage::delete('images/blog/preview'.$post->img);
        }
            
        
        return redirect()->route('admin.posts.index')
        ->with('message', 'Xóa bài viết thành công!')
        ->with('status', 'success');
    }

    public function categories(Request $request)
    {
        $categories = Category::all();
        return View('admin/posts/categories',compact('categories'));
    }

   

     public function GenerateSlug($title)
    {
        $slug = str_slug($title, "-");
        if(Post::where('slug',$slug)->count() >0 )
        {
            $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
        }
        return response()->json([
            'slug' =>  $slug,
            'status' => 'success'
        ]);
    }

    public function SelectTags($post, $tagIds)
    {
        if(is_array($tagIds)){
            foreach($tagIds as $key =>  $id)
            {
                if(empty(Tag::find($id)))
                {
                    $tag = new Tag();
                    $tag->name = $id;
                    $slug = str_slug($id, "-");
                    
                    if(Tag::where('slug',$slug)->count() >0 )
                    {
                        $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
                    }
                    $tag->slug = $slug;
                    $tag->save();
    
                    $tagIds[$key] = $tag->id;
                } 
            }
            $tags = Tag::whereIn('id',$tagIds)->get();
            $post->tags()->sync($tags); 
        }
    }
      /* COMMENT */
      public function comments(Request $request)
      {
          return $this->filtercomments($request);
      }
      public function findcomments(Request $request)
      {
          return $this->filtercomments($request);
      }
    public function filtercomments(Request $request)
    {
        $created_from = $request->created_from;
        $created_to = $request->created_to;
        $review = $request->review;
        $approved_type = $request->approved_type??2;

        $comments =  Comment::where('commentable_type','App\Models\Post')
            ->where('comment','LIKE', '%'. $review . '%')
            ->where(function($query) use ($approved_type){
                if($approved_type==1  || $approved_type==0 )
                    $query->where('approved', $approved_type);
            })
            ->where(function($query) use ($created_from,  $created_to){
                if(strlen($created_from)> 0 && strlen($created_to)> 0)
                    $query->whereBetween('created_at',[$created_from . ' ' . '00:00:00',  $created_to . ' ' . '23:59:59']);
                else if(strlen($created_from)> 0 && strlen($created_to) < 0)
                    $query->where('created_at',$created_from . ' ' . '00:00:00');
                else if(strlen($created_from) < 0 && strlen($created_to) > 0)
                    $query->where('created_at', $created_to . ' ' . '23:59:59');

            })
            ->paginate(21);

        return View('admin/posts/comments',compact('comments'))
        ->with('i', (Input::get('page', 1) - 1) * 21);
    }

    public function deletecomments($id)
    {
        $review = Comment::find($id);
        $review->delete();

        return redirect()->route('admin.posts.comments')
        ->with('message', 'Đã xóa bình luận!')
        ->with('status', 'success');
    }
}
