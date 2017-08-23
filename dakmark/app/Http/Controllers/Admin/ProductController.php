<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCat;
use App\Models\Seo;

class ProductController extends Controller
{
   	public function productCatList(){
        $productCats = ProductCat::all();
        return view('admin.products.product_cat_list')->with(["productCats" => $productCats]);
    }
    public function addProductCat(){
        $productCats = ProductCat::all();
        return view('admin.products.add_product_cat')->with(["productCats" => $productCats]);
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
        $query = Seo::where([['slug', '=', $slug],['system_id', '<>', $system_id]])->get();
        if($query->count() > 0)
            return TRUE;
        return FALSE;
    }
   
}
