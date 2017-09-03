<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductCat;
use App\Models\Seo;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front.products.index')->with('products', $products);
    }

    public function show($url){
        // $product = Product::where('slug', $slug)->firstOrFail();
        // $interested = Product::where('slug', '!=', $slug)->get()->random(4);
        // return view('front.products.show')->with(['product' => $product, 'interested' => $interested]);

        $slug = substr($url, 0, strlen($url)-5);  // loai bo .html 
        $seo = Seo::where('slug',$slug)->first();
        $seo_title = $seo->seo_title;
        $keyword = $seo->keyword;
        $description = $seo->description;
        switch($seo->type):
            case 'PCAT' : // danh muc san pham 
                $productCat = ProductCat::where('system_id',$seo->system_id)->first();
                //$products = Product::where('cat_id',$productCat->id)->orderBy('last_update', 'desc')->paginate(10); // lấy tất cả sp trong danh mục
                $products = $this->get_all_product($productCat->cat_id);
                return view('front.products.product_cat',compact('productCat','products','seo_title','keyword','description'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
                break;

            case 'PRODUCT' : // san pham 
                $product = Product::where('system_id',$seo->system_id)->first();
                return view('fornt.products.product', compact('product','seo_title','keyword','description'));
                break;
        endswitch;
    }

    // Lấy tất cả sản phẩm trong danh mục và danh mục con
    public function get_all_product($cat_id, $productList = null){  
        if($productList === null) {
            $productList = collect();   
        }
        $products = Product::where('cat_id',$cat_id)->get(); 
        $productList = $productList->merge($products);
        $productCat = ProductCat::find($cat_id);
        if(ProductCat::hasChildCat($cat_id)){
            foreach (ProductCat::getChildCat($cat_id) as $childCat) {
                $productList = self::get_all_product($childCat->id, $productList);
            }
        }

        return $productList;
    }
}