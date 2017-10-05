<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductCat;
use App\Models\BlogCat;
use App\Models\Seo;

class PagesController extends Controller
{
    public function home(){
        //$new_products = Product::orderBy('create_time','DESC'); 
        $new_products = Product::all()->take(8);
        $best_sellers = Product::all()->take(8);
        $new_blogs = Blog::all()->take(3);
        return view('front.pages.home')->with(['new_products' => $new_products,'best_sellers' => $best_sellers,'new_blogs' => $new_blogs]);
    }

    // public function about(){
    //     return view('front/pages/about');
    // }

    public function order_list(){
        return view('front/pages/order_list');
    }

    public function show(Request $request, $slug){
        $seo = Seo::where('slug',$slug)->first();
        $seo_title = $seo->seo_title;
        $keyword = $seo->keyword;
        $description = $seo->description;
        switch($seo->type):
            case 'PCAT' : // danh muc san pham 
                $productCat = ProductCat::where('system_id',$seo->system_id)->first();
                //$products = Product::where('cat_id',$productCat->id)->orderBy('last_update', 'desc')->paginate(10); // lấy tất cả sp trong danh mục
                $products = $this->get_all_product($productCat->id);
                return view('front.products.product_cat',compact('productCat','products','seo_title','keyword','description'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
                break;

            case 'PRODUCT' : // san pham 
                $product = Product::where('system_id',$seo->system_id)->first();
                $product_url = $_SERVER['REQUEST_URI'];
                $relate_products = $this->get_relate_products($product->id,4);
                return view('front.products.product', compact('product','product_url','relate_products','seo_title','keyword','description'));
                break;

            case 'BCAT' : // danh mục log
                $blogCat = BlogCat::where('system_id',$seo->system_id)->first();
                $blogs = $this->get_all_blog($blogCat->id);
                return view('front.blogs.blog_cat',compact('blogCat','blogs','seo_title','keyword','description'))
                        ->with('i', ($request->input('page', 1) - 1) * 10);
                break;

            case 'BLOG' : // blog 
            	$this->increase_views($seo->system_id, 'blogs', $request);
                $blog = Blog::where('system_id',$seo->system_id)->first();
                $top_new_blogs = $this->get_top_new_blogs(10);
                $top_view_blogs = $this->get_top_view_blogs(10);
                return view('front.blogs.blog', compact('blog','top_new_blogs','top_view_blogs','seo_title','keyword','description'));
                break;
        endswitch;
    }


    // Tìm kiếm sản phẩm / blogs
    public function search(Request $request){
        $this->validate($request,['keyword' => 'required']);
        $keyword = $request->input('keyword'); 
        
        $products = Product::where("name", "LIKE", "%$keyword%")->paginate(12);   
        $blogs = Blog::where("title", "LIKE", "%$keyword%")->paginate(12);   

        return view('front.pages.search',compact('keyword','products','blogs'))
               ->with('i', ($request->input('page', 1) - 1) * 12);
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

    // Lấy tất cả blog trong danh mục và danh mục con
    public function get_all_blog($cat_id, $blogList = null){  
        if($blogList === null) {
            $blogList = collect();   
        }
        $blogs = Blog::where('cat_id',$cat_id)->get(); 
        $blogList = $blogList->merge($blogs);
        $blogCat = BlogCat::find($cat_id);
        if(BlogCat::hasChildCat($cat_id)){
            foreach (BlogCat::getChildCat($cat_id) as $childCat) {
                $blogList = self::get_all_blog($childCat->id, $blogList);
            }
        }

        return $blogList;
    }

    // Lấy sản phẩm cùng danh mục 
    public function get_relate_products($product_id, $limit) {
        $product = Product::find($product_id);
        $productList = Product::where('cat_id',$product->cat_id)
                              ->where('is_show',1)
                              ->where('id','<>',$product_id)
                              ->orderBy('last_update', 'desc')
                              ->limit($limit)
                              ->get(); 
        return $productList;                       
    }

    // Lấy top blog mới nhất
    public function get_top_new_blogs($limit){
        $blogList = Blog::where('is_show',1)
                        ->orderBy('create_time', 'desc')
                        ->limit($limit)
                        ->get(); 
        return $blogList;                            
    }

    // Lấy top blog xem nhiều nhất
    public function get_top_view_blogs($limit){
        $blogList = Blog::where('is_show',1)
                        ->orderBy('views', 'desc')
                        ->limit($limit)
                        ->get(); 
        return $blogList;                            
    }

    // Tăng lượt xem của bài viết/ sản phẩm
    public function increase_views($system_id, $item_table, Request $request){
        $items = $request->session()->get('items');
        if(!isset($items)){
            $items = array();
            $items[] = $system_id;
            $request->session()->put('items', $items);
            \DB::table($item_table)->where('system_id', $system_id)->increment('views',1);
        }
        else{
            if(!in_array($system_id, $request->session()->get('items'))){
                $items[] = $system_id;
                $request->session()->put('items', $items);
            	\DB::table($item_table)->where('system_id', $system_id)->increment('views',1);
            }              
        }
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addCart(Request $request){
        
    }

    // Lấy bài viết Giới thiệu, system_id = INFO1
    public function about_us(Request $request){
        //$system_id = 'INFO1';
        //$seo = Seo::where('system_id', $system_id)->first();
        //return $this->show($request, $seo->slug);
        return view('front/pages/about');        
    }

    // Lấy bài viết Hướng dẫn mua hàng, system_id = INFO2
    public function purchase_flow(Request $request){
        $system_id = 'INFO2';
        $seo = Seo::where('system_id', $system_id)->first();
        return $this->show($request, $seo->slug);
    }

    // Lấy bài viết Thủ tục trả hàng, system_id = INFO3
    public function returns(Request $request){
        $system_id = 'INFO3';
        $seo = Seo::where('system_id', $system_id)->first();
        return $this->show($request, $seo->slug);
    }

    public function contact(){
        return view('front/pages/contact');
    }
    public function send_contact(Request $request){
        
    }
}
