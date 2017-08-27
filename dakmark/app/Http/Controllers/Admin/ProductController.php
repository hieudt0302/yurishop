<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\ProductCat;
use App\Models\Seo;
use App\Models\Navigator;
use DB;

class ProductController extends Controller
{
   	public function productCatList(){
        $productCats = ProductCat::where("parent_id",0)->orderBy('sort_order', 'asc')->get();
        return view('admin.products.product_cat_list')->with(["productCats" => $productCats]);
    }
    public function addProductCat(){
        $productCats = ProductCat::all();
        return view('admin.products.add_product_cat')->with(["productCats" => $productCats]);
    } 
    public function insertProductCat(Request $request){
        $this->validate($request,['name' => 'required',
                                  'slug' => 'required|unique:seo',
                                  'seo_title' => 'required'
                                ]);
        $max_id = $this->get_max_id('product_cat');
        $system_id = 'PCAT'.$max_id;
        $icon = '' ;
        $icon_file = $request->file('icon');
        if($icon_file != NULL){
            $path = './public/assets/img/product_cat/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }   
            $icon = $this->upload_file($icon_file, $path);
        }

        // Insert data vào bảng product_cat
        $productCat = new ProductCat;
        $productCat->name = $request->name;
        $productCat->en_name = $request->en_name;
        $productCat->system_id = $system_id;
        $productCat->parent_id = $request->parent_id;
        $productCat->icon = $icon;
        $productCat->sort_order = $request->sort_order;
        $productCat->is_show = $request->is_show;
        $productCat->is_show_nav = $request->is_show_nav;
        $productCat->save();

        // Insert data vào bảng seo
        $seo = new Seo;
        $seo->system_id = $system_id;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->type = 1;  // Danh mục sản phẩm : type = 1
        $seo->save();

        // Insert data vào bảng navigator (menu)
        if($request->is_show_nav==1){
            $navigator = new Navigator;
            $navigator->system_id = $system_id;
            $navigator->name = $request->name;
            $navigator->type = 2;   // Menu được tạo gián tiếp (qua danh mục sản phẩm hoặc danh mục bào viết ) : type = 2
            $navigator->save();
        }

        session()->flash('success_message', "Thêm danh mục thành công !");
        return redirect()->route('admin.product-cat');
    }  
    public function editProductCat($cat_id)
    {
        $productCatList = ProductCat::where('parent_id',0)->orderBy('sort_order', 'asc')->get();
        $productCatDetail = ProductCat::where('id',$cat_id)->first();
        $productCatSeo = Seo::where('system_id',$productCatDetail->system_id)->first();
        return view('admin.products.edit_product_cat')->with(["productCatList" => $productCatList, 
                                                              "productCatDetail" => $productCatDetail, 
                                                              "productCatSeo" => $productCatSeo]); 
    }
    public function updateProductCat($cat_id, Request $request)
    {
        $productCat = ProductCat::find($cat_id);
        $this->validate($request,['name' => 'required',
                                  'slug' => 'required',
                                  'seo_title' => 'required'
                                ]);
        $icon = '' ;
        $icon_file = $request->file('icon');
        if($icon_file != NULL){
            $path = './public/assets/img/product_cat/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }   
            $icon = $this->upload_file($icon_file, $path);
        }

        

        // Insert data vào bảng product_cat
        $productCat->name = $request->name;
        $productCat->en_name = $request->en_name;
        $productCat->parent_id = $request->parent_id;
        $productCat->icon = $icon != '' ? $icon : $productCat->icon;
        $productCat->sort_order = $request->sort_order;
        $productCat->is_show = $request->is_show;
        $productCat->is_show_nav = $request->is_show_nav;
        $productCat->save();

        // Insert data vào bảng seo
        $seo = Seo::where('system_id',$productCat->system_id)->first();
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->save();

        // Insert data vào bảng navigator (menu)
        if($productCat->is_show_nav != $request->is_show_nav){
            if($request->is_show_nav==1){
                $navigator = new Navigator;
                $navigator->system_id = $productCat->system_id;
                $navigator->name = $request->name;
                $navigator->type = 2;   // Menu được tạo gián tiếp (qua danh mục sản phẩm hoặc danh mục bào viết ) : type = 2
                $navigator->save();
            }
            else{
                $navigator = Navigator::where('system_id',$productCat->system_id)->first();
                $navigator->delete();
            }
        }

        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.product-cat'); 
    }
    public function productList(){
        return view('admin.products.product_list');
    }
    public function addProduct(){
        return view('admin.products.add_product');
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

    // Upload 1 file
    function upload_file($file, $path){
        $org_name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $pos = strrpos($org_name, '.'); // Lấy vị trí xuất hiện cuối cùng của dấu "."
        $sub_name = substr($org_name, 0, $pos);  // Lấy phần tên gốc
        $sub_name = url_format($sub_name);   // Định dạng lại tên gốc (remove utf8)
        $file_name = $sub_name.".".$ext;
        $i=0;
        $check_file = file_exists($path.$file_name); // Kiểm tra file đã tồn tại trong thư mục hay chưa
        while ($check_file){  // Nếu đã tồn tại thì thêm số đếm vào sau tên file
            $i++;
            $tmp_sub_name = $sub_name.'-'.$i;
            $file_name = $tmp_sub_name.".".$ext;
            $check_file = file_exists($path.$file_name);
        }
      
        if($file->move($path,$file_name))
            return $file_name;
        else
            return '';
    }
   
}
