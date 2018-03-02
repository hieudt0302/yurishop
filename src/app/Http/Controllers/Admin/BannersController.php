<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use DB;
use Validator;
use Intervention\Image\Facades\Image;

class BannersController extends Controller
{
   	public function index(Request $request){
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function edit()
    {
        return View('admin.banners.edit');
    }

    public function update(Request $request)
    {   
        //HP Banner left
        if (request()->hasFile('banner-left-1')) {
            $banner = $request->file('banner-left-1');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 308)->save('frontend/img/banners/banner-left-1.jpg');                      
        }
        if (request()->hasFile('banner-left-2')) {
            $banner = $request->file('banner-left-2');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 421)->save('frontend/img/banners/banner-left-2.jpg');                      
        } 
        if (request()->hasFile('banner-left-3')) {
            $banner = $request->file('banner-left-3');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 246)->save('frontend/img/banners/banner-left-3.jpg');                      
        } 

        //HP Banner midle                 
        if (request()->hasFile('banner-middle-1')) {
            $banner = $request->file('banner-middle-1');            
            $img = Image::make($banner->getRealPath());
            $img->fit(560, 361)->save('frontend/img/banners/banner-middle-1.jpg');                      
        }
        if (request()->hasFile('banner-middle-2')) {
            $banner = $request->file('banner-middle-2');            
            $img = Image::make($banner->getRealPath());
            $img->fit(560, 295)->save('frontend/img/banners/banner-middle-2.jpg');                      
        }
        if (request()->hasFile('banner-middle-3')) {
            $banner = $request->file('banner-middle-3');            
            $img = Image::make($banner->getRealPath());
            $img->fit(560, 294)->save('frontend/img/banners/banner-middle-3.jpg');                      
        }

        //HP Banner right                 
        if (request()->hasFile('banner-right-1')) {
            $banner = $request->file('banner-right-1');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 216)->save('frontend/img/banners/banner-right-1.jpg');                      
        }
        if (request()->hasFile('banner-right-2')) {
            $banner = $request->file('banner-right-2');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 523)->save('frontend/img/banners/banner-right-2.jpg');                      
        }
        if (request()->hasFile('banner-right-3')) {
            $banner = $request->file('banner-right-3');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 246)->save('frontend/img/banners/banner-right-3.jpg');                      
        }        
                        
         
        if (request()->hasFile('banner-ads-1')) {
            $banner = $request->file('banner-ads-1');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 350)->save('frontend/img/banners/banner-ads-1.jpg');                      
        }
        if (request()->hasFile('banner-ads-2')) {
            $banner = $request->file('banner-ads-2');            
            $img = Image::make($banner->getRealPath());
            $img->fit(270, 350)->save('frontend/img/banners/banner-ads-2.jpg');                      
        }          

                                                      
      
        return redirect()->back()
        ->with('message', 'Banner/icon đã được cập nhật')
        ->with('status', 'success');
    }

   

    public function destroy($id){

    }

}
