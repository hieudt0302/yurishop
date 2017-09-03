<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Slider;
use DB;

class SliderController extends Controller
{
   	public function sliderList(){
        $sliders = Slider::orderBy('sort_order', 'asc')->get();
        return view('admin.slider.slider_list')->with(["sliders" => $sliders]);
    }
    public function addSlider(){
        $sliders =  Slider::all();  
        return view('admin.slider.add_slider')->with(["sliders" => $sliders]);
    } 
    public function insertSlider(Request $request){
        // Thiếu validation

        $image = '';
        $img_file = $request->file('image');
        if($img_file != NULL){
            $path = './public/assets/img/slider/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
            $image = $this->upload_file($request->title, $img_file, $path);
        }   

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->en_title = $request->en_title;
        $slider->description = $request->description;
        $slider->en_description = $request->en_description;
        $slider->url = $request->url;
        $slider->sort_order = $request->sort_order;
        $slider->is_show = $request->is_show;
        $slider->image = $image;
        $slider->save();

        session()->flash('success_message', "Thêm slider thành công !");
        return redirect()->route('admin.slider');
    }  
    public function editSlider($slider_id)
    {
        $sliderDetail = Slider::find($slider_id);
        return view('admin.slider.edit_slider')->with(["sliderDetail" => $sliderDetail]); 
    }
    public function updateSlider($slider_id, Request $request)
    {
        $slider = Slider::find($slider_id);

        // Thiếu validation

        $image = '';
        $img_file = $request->file('image');
        if($img_file != NULL){
            $path = './public/assets/img/slider/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }
            $image = $this->upload_file($request->title, $img_file, $path);
        }   

        $slider->title = $request->title;
        $slider->en_title = $request->en_title;
        $slider->description = $request->description;
        $slider->en_description = $request->en_description;
        $slider->url = $request->url;
        $slider->sort_order = $request->sort_order;
        $slider->is_show = $request->is_show;
        $slider->image = $image != '' ? $image : $slider->image;
        $slider->save();


        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.slider'); 
    }
    public function deleteSlider($slider_id){
        $slider = Slider::find($slider_id);
        if($slider->image != ''){
            $img_file = './public/assets/img/slider/'.$slider->image;
            if(file_exists($img_file))
                unlink($img_file);
        }
        $slider->delete();

        session()->flash('success_message', "Xóa slider thành công !");
        return redirect()->route('admin.slider'); 
    }

    // Upload 1 file
    function upload_file($object_name, $file, $path){
        if($object_name != ''){
            $ext = $file->getClientOriginalExtension();
            $org_name = url_format($object_name);   // Định dạng lại phần tên gốc (remove utf8)
            $file_name = $org_name.".".$ext;
            $i=0;
            $check_file = file_exists($path.$file_name); // Kiểm tra file đã tồn tại trong thư mục hay chưa
            while ($check_file){  // Nếu đã tồn tại thì thêm số đếm vào sau tên file
                $i++;
                $tmp_org_name = $org_name.'-'.$i;
                $file_name = $tmp_org_name.".".$ext;
                $check_file = file_exists($path.$file_name);
            }
            if($file->move($path,$file_name))
                return $file_name;
            else
                return '';
        }
        else
            return $file->getClientOriginalName();
    }
}
