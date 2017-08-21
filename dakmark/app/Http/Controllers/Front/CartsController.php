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
        // $request->price); //guid

        Cart::add(['id' => 'SameID123', 'name' => 'Product 1', 'qty' => 1, 'price' => 1500.25, 
        'options' => ['size' => 'M', 'color'=>'Red', 'shop'=>'Shop 1', 'url'=>'#','image'=>'#']]);
        return redirect('cart')->withSuccessMessage('Sản phẩm đã được thêm vào giỏ!');
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
}
