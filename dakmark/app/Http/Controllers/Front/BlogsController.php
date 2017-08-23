<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        Log::info('reached blog index');
        $blogs = Blog::all();
        return view('front.blogs.index')->with('blogs', $blogs);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info('reached blog show');
        $blog = Blog::where('id',$id)->first();
        return view('front.blogs.show')->with(['blog' => $blog]);
    }
}
