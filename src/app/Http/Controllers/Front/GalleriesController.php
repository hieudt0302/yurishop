<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Media;
use Validator;
use DB;

class GalleriesController extends Controller
{
    public function index()
    {     
       $galleries = Gallery::where('published', true)->get();

        return view('front.galleries.index',compact('galleries'));
    }
}
