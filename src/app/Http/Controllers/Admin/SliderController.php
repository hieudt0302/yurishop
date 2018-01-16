<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use App\Models\Slider;
use App\Models\SliderTranslation;
use App\Models\Language;
use DB;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required|string|min:1',
            'img' => 'required|image'            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }       

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->order = $request->order??0;
        $slider->is_show = $request->is_show;

        $slider->image = '' ;
        if (request()->hasFile('img')) {
            $image = $request->file('img');
            $img_path = $image->storeAs('images/slider',$image->getClientOriginalName());                              
            $img = Image::make(Storage::get($img_path))->fit(1920, 750)->encode();
            Storage::put($img_path, $img);                     
            $slider->image = $img_path;                      
        }           

        $slider->save();

        
        return redirect()->action(
            'Admin\SliderController@edit', ['id' => $slider->id]
        );
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $languages = Language::all();
        
        $language_id = Input::get('language_id')??0;
        $tab = 1;
        $translation =  null;
        if(!empty( $language_id) &&   $language_id  > 0 ){
            $translation = SliderTranslation::where('slider_id',$id)->where('language_id', $language_id)->withoutGlobalScopes()->first();
            $tab= 2;
        }
        return View('admin.sliders.edit',compact('slider','languages', 'translation','tab', 'language_id'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $slider = Slider::find($id);

        if (request()->hasFile('img')) {
            $image = $request->file('img');
            $img_path = $image->storeAs('images/slider',$image->getClientOriginalName());                              
            $img = Image::make(Storage::get($img_path))->fit(1920, 750)->encode();
            Storage::put($img_path, $img);                     
            $slider->image = $img_path;                      
        }    

        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->order = $request->order??0;
        $slider->is_show = $request->is_show;
        $slider->save();
      

        return redirect()->back()
        ->with('message', 'Slider đã được cập nhật')
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

        $translation = SliderTranslation::where('slider_id', $id)
        ->where('language_id', $request->language_id)->withoutGlobalScopes()
        ->first();
        
        if(!empty($translation)){
            $translation->description = $request->description_translate??'';
            $translation->save();
        }
        else{
            $sliderTranslation = new SliderTranslation();
            $sliderTranslation->description = $request->description_translate??'';
            $sliderTranslation->language_id = $request->language_id;
            $sliderTranslation->slider_id = $id;
            $sliderTranslation->save();
        }
        
        return redirect()->back()
        ->with('message', 'Cập nhật nội dung mới thành công')
        ->with('status', 'success')
        ->withInput(['tab'=> 2]);
    }

    public function destroy($id){
        $slider = Slider::find($id);
        Storage::delete($slider->image);
        $slider->delete();

        session()->flash('success_message', "Xóa thành công !");
        return redirect()->route('admin.sliders.index'); 
    }

    public function GenerateSlug($title)
    {
        $url = str_slug($title, "-");
        if(Slider::where('url',$url)->count() >0 )
        {
            $url = $url . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
        }
        return response()->json([
            'url' =>  $url,
            'status' => 'success'
        ]);
    }
}
