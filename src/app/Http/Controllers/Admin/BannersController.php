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
        //Banner
        if (request()->hasFile('banner-left')) {
            $banner = $request->file('banner-left');            
            $img = Image::make($banner->getRealPath());
            $img->fit(960, 400)->save('frontend/images/uploads/ads-bg1.jpg');                      
        } 
        if (request()->hasFile('banner-right')) {
            $banner = $request->file('banner-right');            
            $img = Image::make($banner->getRealPath());
            $img->fit(960, 400)->save('frontend/images/uploads/ads-bg2.jpg');                      
        } 
        if (request()->hasFile('banner-full')) {
            $banner = $request->file('banner-full');            
            $img = Image::make($banner->getRealPath());
            $img->fit(1920, 400)->save('frontend/images/uploads/ads-bg3.jpg');                      
        } 

        //Icon
        if (request()->hasFile('icon-1')) {
            $icon = $request->file('icon-1');            
            $img = Image::make($icon->getRealPath());
            $img->resizeCanvas(null, 120)->save('images/logo/poko.png');                      
        }
        if (request()->hasFile('icon-2')) {
            $icon = $request->file('icon-2');            
            $img = Image::make($icon->getRealPath());
            $img->resizeCanvas(null, 120)->save('images/logo/origin.png');                      
        }
        if (request()->hasFile('icon-3')) {
            $icon = $request->file('icon-3');            
            $img = Image::make($icon->getRealPath());
            $img->resizeCanvas(null, 120)->save('images/logo/fairtrade.png');                      
        }    
        if (request()->hasFile('icon-4')) {
            $icon = $request->file('icon-4');            
            $img = Image::make($icon->getRealPath());
            $img->resizeCanvas(null, 120)->save('images/logo/community-icon.png');                      
        }                                                 
      
        return redirect()->back()
        ->with('message', 'Banner/icon đã được cập nhật')
        ->with('status', 'success');
    }

   

    public function destroy($id){

    }

}
