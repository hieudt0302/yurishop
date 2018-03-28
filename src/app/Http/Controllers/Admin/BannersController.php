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
        if (request()->hasFile('banner-hp-1')) {
            $banner = $request->file('banner-hp-1');            
            $img = Image::make($banner->getRealPath());
            $img->fit(366, 269)->save('frontend/img/banners/banner-hp-1.jpg');                      
        }
        if (request()->hasFile('banner-hp-2')) {
            $banner = $request->file('banner-hp-2');            
            $img = Image::make($banner->getRealPath());
            $img->fit(366, 269)->save('frontend/img/banners/banner-hp-2.jpg');                      
        } 
        if (request()->hasFile('banner-hp-3')) {
            $banner = $request->file('banner-hp-3');            
            $img = Image::make($banner->getRealPath());
            $img->fit(366, 269)->save('frontend/img/banners/banner-hp-3.jpg');                      
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
