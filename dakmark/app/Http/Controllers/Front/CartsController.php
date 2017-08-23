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
        try
        {
            $url = $request->url;
            $productName = $request->productName;
            $image = $request->image;
            $shop = $request->shop;
            $color = $request->color;
            $colorImg = $request->colorImage;
            $sizes = $request->sizes;

            foreach($sizes as $s){
                $GUID = $this->getGUID();
                Cart::add(['id' => $GUID , 'name' => $productName, 'qty' => $s['amount'],  'price' => $s['sizePrice'], 
                'options' => [
                    'size' => $s['sizeName'], 'color'=>$color,'colorimg'=> $colorImg, 'shop'=>$shop, 'url'=>$url,'image'=>$image
                ]]);
            }

            session()->flash('success_message',  'URL:' . $url . 'PRODUCTNAME:' . $productName . 'IMAGE:' . $image . 'SHOP:' . $shop . 'COLOR:' . $color . 'COLORIMAGE:' . $colorImg);

            return response()->json(['success' => true]);
        }       
        catch (\Exception $e)
        {
            session()->flash('success_message', $e->getMessage());
            return response()->json(['success' => false]);
        }

       

        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
        //     return $cartItem->id === $request->id;
        // });

        // if (!$duplicates->isEmpty()) {
        //     return redirect('cart')->withSuccessMessage('Sản phẩm đã có trong giỏ!');
        // }

        // Cart::add($request->id, 
        // $request->name,
        // $request->size, 
        // $request->color, 
        // $request->quantity, 
        // $request->price);
        // Cart::add(['id' => 'SameID123', 'name' => 'Product 1', 'qty' => 1, 'price' => 1500.25, 
        // 'options' => ['size' => 'M', 'color'=>'Red', 'shop'=>'Shop 1', 'url'=>'#','image'=>'#']]);
        // return redirect('cart')->withSuccessMessage('Sản phẩm đã được thêm vào giỏ!');
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
