<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Slider;
use App\Models\SliderTranslation;
use App\Models\Language;
use DB;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
   	public function index(Request $request){
        $sliders = Slider::orderBy('order', 'asc')->paginate(10);
        return view('admin.sliders.index',compact('sliders'))
        ->with('i', ($request->input('page', 1) - 1) * 10);  
    }

    public function create(){
        $language_list = Language::all();        
        return view('admin.sliders.create',compact('language_list'));
    }

    public function store(Request $request){
        $this->validate($request,['title' => 'required',
                                  'url' => 'required',
                                  'sort_order' => 'required'                                  
                                ]);        

        $image = '';
        $img_file = $request->file('image');
        if($img_file != NULL){
            $path = './images/slider';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
            $img = Image::make($img_file->getRealPath());
            $img->fit(1920, 1080)->save($path.'/'.$img_file->getClientOriginalName());               
            $image = $img_file->getClientOriginalName();
        }   

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->order = $request->sort_order;
        $slider->is_show = $request->is_show;
        $slider->image = $image;
        $slider->save();

        $language_list = Language::all();
        foreach ($language_list as $language){ 
            $slider_translation = new SliderTranslation;
            $slider_translation->slider_id = $slider->id;
            $slider_translation->language_id = $language->id;
            $slider_translation->description = $request->input($language->id.'-description');
            $slider_translation->save();
        }        

        session()->flash('success_message', "Thêm slider thành công !");
        return redirect()->route('admin.sliders.index');
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $language_list = Language::all();
        $slider_translations = SliderTranslation::where('slider_id',$id)->orderBy('language_id','asc')->get();
        return view('admin.sliders.edit',compact('slider','language_list','slider_translations'));   
    }

    public function update($id, Request $request)
    {
        $slider = Slider::find($id);

        $this->validate($request,['title' => 'required',
                                  'url' => 'required',
                                  'sort_order' => 'required'                                  
                                ]);   

        $image = '';
        $img_file = $request->file('image');
        if($img_file != NULL){
            $path = './images/slider';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
            $img = Image::make($img_file->getRealPath());
            $img->fit(1920, 1080)->save($path.'/'.$img_file->getClientOriginalName());               
            $image = $img_file->getClientOriginalName();
            $slider->image = $image;            
        }   

        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->order = $request->sort_order;
        $slider->is_show = $request->is_show;
        $slider->save();

        $language_list = Language::all();
        foreach ($language_list as $language){
            $slider_tran_id=$request->input($language->id.'-id');
            $slider_translation = SliderTranslation::find($slider_tran_id);
            if ($slider_translation == null) {
                $slider_translation = new SliderTranslation;
                $slider_translation->slider_id = $slider->id;
                $slider_translation->language_id = $language->id;                
            }
            $slider_translation->description = $request->input($language->id.'-description');
            $slider_translation->save();
        }        


        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.sliders.index'); 
    }
    public function destroy($id){
        $slider = Slider::find($id);
        if($slider->image != ''){
            $img_file = './public/assets/img/slider/'.$slider->image;
            if(file_exists($img_file))
                unlink($img_file);
        }
        $slider->delete();

        session()->flash('success_message', "Xóa slider thành công !");
        return redirect()->route('admin.sliders.index'); 
    }
}
