<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id','DESC')->paginate(10);
        return view('admin.blogs.index')->with(['blogs'=> $blogs, 'type' => 'none']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit',compact('blog'));
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
        $this->validate($request, [
            'title' => 'required',
            'img' => 'required',
            'status' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->img = $request->input('img');
        $blog->status = $request->input('status');
        $blog->content = $request->input('content');
        $blog->save();
        return redirect()->route('admin.blogs.index')
                        ->with('success','Blog updated successfully');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->status = $request->input('status');
        $blog->content = $request->input('content');
        $blog->view_count = 0;
        $blog->slug = 'none';    
        // upload images
        $f = $request->file('img')->getClientOriginalName();
        $filename = time().'_'.$f;
        $blog->img = $filename;        
        $request->file('img')->move('public/uploads/blogs/',$filename);   
        $blog->save();
        return redirect()->route('admin.blogs.index')
                        ->with('success','Blog created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);        
        $blog ->delete();
        return redirect()->route('admin.blogs.index')
                        ->with('success','Blog deleted successfully');
    }

    public function search(request $request) {
        $key = $request->key;
        $blogs = Blog::where('title', 'LIKE', '%'.$key.'%')->Orderby('title','ASC')->take(20)->get();
        return view ('admin.blogs.index',['blogs'=>$blogs,'type'=>'search','key'=>$key]);    
    }
}
