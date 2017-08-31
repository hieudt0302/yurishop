<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Navigator;
use App\Models\Seo;
use App\Models\ProductCat;
use App\Models\BlogCat;
use DB;

class NavigatorController extends Controller
{
   	public function navigatorList(){
        $navigators = Navigator::where("parent_id",0)->orderBy('sort_order', 'asc')->get();
        return view('admin.navigator.navigator_list')->with(["navigators" => $navigators]);
    }
    public function addNavigator(){
        $navigators =  Navigator::where("type",1)->orderBy('sort_order', 'asc')->get();  // lấy danh sách menu được tạo trực tiếp
        $system_cats = Seo::where("type","PCAT")->orWhere("type","BCAT")->get(); // lấy tất cả danh mục sản phẩm và danh mục blogs
        return view('admin.navigator.add_navigator')->with(["navigators" => $navigators, "system_cats" => $system_cats]);
    } 
    public function insertNavigator(Request $request){
        $this->validate($request,['name' => 'required',
                                  'slug' => 'required|unique:seo', // nếu tạo menu từ danh mục hệ thống thì unique ko đúng
                                  'seo_title' => 'required'
                                ]);
        $max_id = $this->get_max_id('navigator');
        $system_id = 'NAV'.$max_id;

        // Insert data vào bảng navigator
        $navigator = new Navigator;
        $navigator->system_id = $system_id;
        $navigator->name = $request->name;
        $navigator->en_name = $request->en_name;
        $navigator->parent_id = $request->parent_id;
        $navigator->sort_order = $request->sort_order;
        $navigator->is_show = $request->is_show;
        $navigator->type = 1; // menu được tạo trực tiếp : type = 1
        $navigator->save();

        // Insert data vào bảng seo
        $seo = new Seo;
        $seo->system_id = $system_id;
        $seo->name = $request->name;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->type = "NAVIGATOR";  
        $seo->save();

        session()->flash('success_message', "Thêm menu thành công !");
        return redirect()->route('admin.navigator');
    }  
    public function editNavigator($nav_id)
    {
        $navigatorList = Navigator::where('parent_id',0)->orderBy('sort_order', 'asc')->get();
        $navigatorDetail = Navigator::where('id',$nav_id)->first();
        $navigatorSeo = Seo::where('system_id',$navigatorDetail->system_id)->first();
        return view('admin.navigator.edit_navigator')->with(["navigatorList" => $navigatorList, 
                                                              "navigatorDetail" => $navigatorDetail, 
                                                              "navigatorSeo" => $navigatorSeo]); 
    }
    public function updateNavigator($nav_id, Request $request)
    {
        $navigator = Navigator::find($nav_id);
        $this->validate($request,['name' => 'required',
                                  'slug' => 'required',  // thiếu check_exist
                                  'seo_title' => 'required'
                                ]);

        // Update data bảng navigator
        $navigator->name = $request->name;
        $navigator->en_name = $request->en_name;
        $navigator->parent_id = $request->parent_id;
        $navigator->sort_order = $request->sort_order;
        $navigator->is_show = $request->is_show;
        $navigator->save();

        // Update data bảng seo
        $seo = Seo::where('system_id',$navigator->system_id)->first();
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->save();

        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.navigator'); 
    }
    public function deleteNavigator($nav_id){
        $navigator = Navigator::find($nav_id);
        if($navigator->type == 'NAV'){  // nếu menu được tạo trực tiếp thì xóa record seo tương ứng
            $seo = Seo::where('system_id',$navigator->system_id)->first();
            $seo->delete();
        }
        elseif($navigator->type == 'PCAT'){
            $pCat = ProductCat::where('system_id',$navigator->system_id)->first();
            $pCat->is_show_nav = 0;
            $pCat->save();
        }
        elseif($navigator->type == 'BCAT'){
            $bCat = BlogCat::where('system_id',$navigator->system_id)->first();
            $bCat->is_show_nav = 0;
            $bCat->save();
        }
        $navigator->delete();

        session()->flash('success_message', "Xóa menu thành công !");
        return redirect()->route('admin.navigator'); 
    }

    // Hàm ajax lấy slug theo tên
    public function generate_slug(Request $request){
        $system_id = $request->system_id;
        $system_id = isset($system_id) ? $system_id : '';
        $name = $request->name;
        $slug = url_format($name);
        $i=0;
        $check_slug =  $this->check_slug_exist($slug, $system_id);
        while ($check_slug){
            $i++;
            $slug.= '-'.$i;
            $check_slug =  $this->check_slug_exist($slug, $system_id);
        }

        echo $slug;
    }

    // Kiểm tra slug đã tồn tại hay chưa
    function check_slug_exist($slug, $system_id){
        $slugCount = DB::table('seo')->where([['slug', '=', $slug],['system_id', '<>', $system_id]])->count(); 
        if($slugCount > 0)
            return TRUE;
        return FALSE;
    }

    //Lấy id lớn nhất trong table
    function get_max_id($table){
        $max_id = DB::table($table)->max('id');
        if($max_id != NULL)
            return $max_id + 1;
        else
            return 1;
    }

    // Lấy thông tin danh mục hệ thống
    function get_system_cat($system_id){
        $data = array();
        $system_cat = Seo::where('system_id',$system_id)->first();
        if($system_cat != NULL){
            $data = array('name' => $system_cat->name,
                      'en_name' => $system_cat->en_name,
                      'slug' => $system_cat->slug,
                      'seo_title' => $system_cat->seo_title,
                      'en_seo_title' => $system_cat->en_seo_title,
                      'keyword' => $system_cat->keyword,
                      'description' => $system_cat->description);
        }

        echo json_encode($data);  
    }
}
