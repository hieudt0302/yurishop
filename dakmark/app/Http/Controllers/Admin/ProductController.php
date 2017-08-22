<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCat;

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
        $id = $this->input->post('system_id');
        $system_id = isset($id) ? $id : '';
        $name = $this->input->post('name');
        $url = url_format($name);
        $i=0;
        $check_url=  $this->main_model->check_exists(array('seo_url'=>$url,'system_id != '=>$system_id),'seo');
        while ($check_url){
            $i++;
            $url.= '-'.$i;
            $check_url=  $this->main_model->check_exists(array('seo_url'=>$url,'system_id != '=>$system_id),'seo');
        }
        echo $url;
    }
   
}
