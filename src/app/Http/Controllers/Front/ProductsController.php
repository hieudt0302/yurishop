<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Validator;
use \Cart as Cart;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::has('products')->get();
        $results = Product::where('published',1)->paginate(10);
        return View('front/products/index',compact('results','tags'));
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
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        if(empty($product))
            return abort(404);
        $starAvg = $product->comments->avg('rate');
      
        return View('front.products.show', compact('product','starAvg'));
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

    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1004',
                'status' => 'error',
                'newCartItemCount' => Cart::count()
            ]);
        }
       
        
        Cart::add($request->id, $request->name, $request->quantity, $request->price);
        
        return response()->json([
            'message' => 'Đã thêm '. $request->quantity .' sản phẩm vào giỏ hàng!',
            'status' => 'success',
            'newCartItemCount' => Cart::count()
        ]);
    }

    public function search(Request $request){
        $search_key = $request->input('key'); 
        

        $products = Product::where('published',1)
        ->whereNull('deleted_at')
        ->where("name", "LIKE", "%$search_key%")
        ->paginate(10);  

        //TODO search multilang
        $tags = Tag::has('products')->get();
        $comments = Tag::has('products')->get();
        $lastProducts = Product::take(10)->get(); ///TODO: move number limit to database setting        

        return view('front/products/index',compact('products','search_key','tags','comments', 'lastProducts'));
    }     
}
