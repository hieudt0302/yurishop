<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cart as Cart;
use Validator;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.carts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){        
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $product_url = $request->product_url;
        $price = $request->price;
        $image = $request->product_img;
        $amount = $request->amount;
        /*
        $product_stored = $request->session()->get('product_stored');
        if(!isset($product_stored)){  // nếu giỏ hàng chưa có sản phẩm nào
            $product_stored = array();  // tạo mới giỏ hàng
            $product_stored[] = array('product_id' => $product_id, 'amount' => $amount);
            $request->session()->put('product_stored', $product_stored);  // lưu giỏ hàng vào session
        }
        else{  // nếu giỏ hàng đã có sản phẩm
            $hasId = 0;  // kiểm tra xem sản phẩm này đã có trong giỏ hàng hay chưa
            $k = null;
            foreach ($product_stored as $key => $value) {
                if($product_id==$value['product_id']){
                    $hasId = 1;
                    $k = $key;
                    break;
                }
            }
            if($hasId==0){  // nếu sản phẩm này chưa có trong giỏ hàng
                $product_stored[] = array('product_id' => $product_id, 'amount' => $amount);
                $request->session()->put('product_stored', $product_stored);
            }
            else{ // nếu sản phẩm này đã có trong giỏ hàng
                $product_stored[$k]['amount'] += $amount;  // cập nhật số lượng sản phẩm
                $request->session()->put('product_stored', $product_stored);
            }
        }
        echo count($product_stored);
        */

        Cart::add(['id' => $product_id, 'name' => $product_name, 'qty' => $amount,  'price' => $price,
                   'options' => [ 'image' => $image, 'url' => $product_url]
        ]);
        $itemNum = Cart::instance('default')->count(false);
        //session()->flash('success_message', 'Đã thêm sản phẩm vào giỏ hàng!');
        return response()->json(['success' => true, 'itemNum'=> $itemNum]);
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
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            session()->flash('error_message', 'Số lượng không phù hợp!');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success_message', 'Số lượng đã cập nhật thành công!');

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Sản phẩm đã được xóa!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
     public function emptyCart()
     {
         Cart::destroy();
         return redirect('cart')->withSuccessMessage('Giỏ hàng của bạn đã được xóa!');
     }

     function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
}
