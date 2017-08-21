<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   
   	public function productCatList(){
        return view('admin.products.product_cat_list');
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
