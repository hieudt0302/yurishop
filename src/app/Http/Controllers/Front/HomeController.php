<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Slider;
use App\Models\InfoPage;
use App\Models\InfoPageTranslation;
use App\Models\Language;
use App\Models\Subscribe;
use App\Models\Category;
use App\Models\MailTemplate;
use App\Models\MailTemplateTranslation;
use Setting;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = InfoPage::where('slug','about')->first();
        $product_origin = InfoPage::where('slug','product-origin')->first();
        $product_quality = InfoPage::where('slug','product-quality')->first();
        $community_category = Category::where('slug', 'community')->firstOrFail();

        $new_products = Product::where('published',1)->orderBy('created_at', 'desc')->limit(4)->get();
        // $best_sellers_products = DB::table('products')
        //                             ->join('order_details','products.id', '=', 'order_details.product_id')
        //                             ->select('products.*', DB::raw('COUNT(order_details.product_id) as count'))
        //                             ->groupBy('product_id')
        //                             ->orderBy('count', 'desc')
        //                             ->limit(4)
        //                             ->get();

        $best_sellers_products = Product::join('order_details','products.id', '=', 'order_details.product_id')
                                        ->select('products.*', DB::raw('COUNT(order_details.product_id) as count'))
                                        ->groupBy('product_id')
                                        ->orderBy('count', 'desc')
                                        ->limit(4)
                                        ->get();


        $sale_products = Product::where('published',1)
                                ->where('special_price', '>', 0)
                                ->where('special_price_start_date', '<=', date('Y-m-d', time()))
                                ->where('special_price_end_date', '>=', date('Y-m-d', time()))
                                ->orderBy('created_at', 'desc')
                                ->limit(4)
                                ->get();                
        $new_blogs = Post::where('published',1)->orderBy('updated_at', 'desc')->limit(3)->get();
        $sliders = Slider::where('is_show',1)->get();      

        //var_dump($best_sellers_products); die();  
        return View("front/home/index",compact('about_us', 'product_origin', 'product_quality', 'new_products', 'best_sellers_products', 'sale_products', 'new_blogs','sliders','community_category'));

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

    public function promotion()
    {
        $promo = true;
        $results = Product::where('special_price', '>', 0)
                                ->where('special_price_start_date', '<=', date('Y-m-d', time()))
                                ->where('special_price_end_date', '>=', date('Y-m-d', time()))
                                ->orderBy('created_at', 'desc')
                                ->paginate(12);          
        return View("front.products.index",compact('results','promo'));
    }       

    public function contact()
    {
        return View("front/home/contact");
    }
    public function send_contact(Request $request){
        $input = $request->all();
        Mail::send('front/home/contact_mail', array('name'=>$input["name"], 'email'=>$input["email"], 'phone'=>$input["phone"], 'content'=>$input['message']),
            function($message){
                $message->to('ducthang.237@gmail.com', 'Admin')->subject('Mail liên hệ');
        });
        session()->flash('success_message', 'Send message successfully!');

         return View("front/home/contact");
    }

    public function subscribe(Request $request){
        if(Subscribe::existEmail($request->email)){
            return response()->json(['success' => false]);
        }
        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->locale = \App::getLocale(); 
        $subscribe->save();
        return response()->json(['success' => true]);
    }

    public function unsubscribe($email){
        DB::table('subscribe')->where('email', $email)->delete();
        return View("front/home/unsubscribe");
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
        $language = Language::where('code',$locale)->first();
        if ($language != null){
            $language_id = $language->id; //make english as default alternative
        }
        $info_page = InfoPage::where('slug',$slug)->first(); 
        $info_page_translation = InfoPageTranslation::where('info_page_id',$info_page->id)->where('language_id',$language_id)->first();  
        return $info_page_translation;      

    }


}
