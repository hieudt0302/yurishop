<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Slider;
use App\Models\InfoPage;
use App\Models\InfoPageTranslation;
use App\Models\Language;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $about_us = $this->getInfoPageTranslation('about-us');
        // $product_origin = $this->getInfoPageTranslation('product-origin');
        // $product_quality = $this->getInfoPageTranslation('product-quality');
        $new_products = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $best_sellers_products = Product::orderBy('created_at', 'desc')->limit(4)->get();
        $sale_products = Product::orderBy('created_at', 'desc')->limit(4)->get();                
        $new_blogs = Post::orderBy('updated_at', 'desc')->limit(3)->get();
        $sliders = Slider::where('is_show',1)->get();        
        return View("front/home/index",compact('about_us', 'product_origin', 'product_quality', 'new_products', 'best_sellers_products', 'sale_products', 'new_blogs','sliders'));

    }

    public function about()
    { 
        $info_page_translation = $this->getInfoPageTranslation('about');
        return View("front.home.infopage",compact('info_page_translation'));
    }

    public function returns()
    {
        $info_page_translation = $this->getInfoPageTranslation('returns');
        return View("front.home.infopage",compact('info_page_translation'));
    }

    public function purchase_flow()
    {
        $info_page_translation = $this->getInfoPageTranslation('purchase-flow');
        return View("front.home.infopage",compact('info_page_translation'));
    }    

    public function showrooms()
    {
        $info_page_translation = $this->getInfoPageTranslation('showrooms');
        return View("front.home.infopage",compact('info_page_translation'));
    }
    
    public function product_origin()
    {
        $info_page_translation = $this->getInfoPageTranslation('product-origin');
        return View("front.home.infopage",compact('info_page_translation'));
    }

    public function product_quality()
    {
        $info_page_translation = $this->getInfoPageTranslation('product-quality');
        return View("front.home.infopage",compact('info_page_translation'));
    }   

    public function contact()
    {
        return View("front/home/contact");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $search_key = $request->input('key'); 
        

        $products = ProductTranslation::where("name", "LIKE", "%$search_key%")
        ->paginate(12);             


        $posts = PostTranslation::where("title", "LIKE", "%$search_key%")
        ->paginate(4);             


        return view('front/home/search',compact('products','posts','search_key'));
    }      

    function getInfoPageTranslation($slug){
        $language_id = 1; //make vietnamese as default alternative
        $locale = \App::getLocale(); 
        $language = Language::where('name',$locale)->first();
        if ($language != null){
            $language_id = $language->id; //make english as default alternative
        }
        $info_page = InfoPage::where('slug',$slug)->first(); 
        $info_page_translation = InfoPageTranslation::where('info_page_id',$info_page->id)->where('language_id',$language_id)->first();  
        return $info_page_translation;      

    }


}
