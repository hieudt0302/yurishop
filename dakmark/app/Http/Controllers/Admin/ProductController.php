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
        return view('admin.products.add_product_cat');
    }  
    public function productList(){
        return view('admin.products.product_list');
    }
    public function addProduct(){
        return view('admin.products.add_product');
    }  
   
}
