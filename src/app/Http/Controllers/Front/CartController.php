<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Validator;
use \Cart as Cart;
use DB;

class CartController extends Controller
{
    public function UpdateCartItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
            'newQuantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1002',
                'status' => 'error'
            ]);
        }
       
        Cart::update($request->ItemId, $request->newQuantity);
        
        return response()->json([
            'message' => 'Đã thêm '. $request->newQuantity .' sản phẩm vào giỏ hàng!',
            'status' => 'success',
            'type' => 'update',
            'rowId' => $request->ItemId,
            'newCartItemCount' => Cart::count(),
            'showCheckoutButtons'=>true
        ]);
    }

    public function DeleteCartItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1001',
                'status' => 'error'
            ]);
        }
       
        Cart::remove($request->ItemId);
        
        return response()->json([
            'message' => 'Đã xóa sản phẩm vào khỏi hàng!',
            'status' => 'success',
            'type' => 'remove',
            'newCartItemCount' => Cart::count(),
            'rowId' => $request->ItemId,
            'showCheckoutButtons'=>true
        ]);
    }
    
    public function MoveItemBetweenCartAndWishlist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1001',
                'status' => 'error'
            ]);
        }

        $item = Cart::get($request->ItemId);  
        Cart::remove($request->ItemId);
        Cart::instance('wishlist')->add($item->id, $item->name, $item->qty, $item->price, ['summary' => $item->options->summary, 'source' => $item->options->source]);

        return response()->json([
            'message' => 'Đã di chuyển sản phẩm sang danh sách mong ước!',
            'status' => 'success',
            'type' => 'remove',
            'rowId' => $request->ItemId,
            'newCartItemCount' => Cart::instance('default')->count(),
            'newWishlistItemCount' => Cart::instance('wishlist')->count()
        ]);
    }



    public function UpdateWishlistItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
            'newQuantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1002',
                'status' => 'error'
            ]);
        }
       
        Cart::instance('wishlist')->update($request->ItemId, $request->newQuantity);
        
        return response()->json([
            'message' => 'Đã thêm '. $request->newQuantity .' sản phẩm vào giỏ hàng!',
            'status' => 'success',
            'type' => 'update',
            'rowId' => $request->ItemId,
            'newCartItemCount' => Cart::instance('default')->count(),
            'newWishlistItemCount' => Cart::instance('wishlist')->count()
        ]);
    }

    public function DeleteWishlistItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1001',
                'status' => 'error'
            ]);
        }
       
        Cart::instance('wishlist')->remove($request->ItemId);
        
        return response()->json([
            'message' => 'Đã xóa sản phẩm vào khỏi hàng!',
            'status' => 'success',
            'type' => 'remove',
            'newCartItemCount' => Cart::instance('default')->count(),
            'newWishlistItemCount' => Cart::instance('wishlist')->count(),
            'rowId' => $request->ItemId
        ]);
    }
    
    public function MoveItemBetweenWishlistAndCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ItemId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Không nhận được yêu cầu!',
                'status' => 'error'
            ]);
        }

        $item =  Cart::instance('wishlist')->get($request->ItemId);  
        Cart::instance('default')->add($item->id, $item->name, $item->qty, $item->price,  ['summary' => $item->options->summary, 'source' => $item->options->source]);
        Cart::instance('wishlist')->remove($request->ItemId);

        return response()->json([
            'message' => 'Đã di chuyển sản phẩm sang giỏ hàng!',
            'status' => 'success',
            'type' => 'remove',
            'rowId' => $request->ItemId,
            'newCartItemCount' => Cart::instance('default')->count(),
            'newWishlistItemCount' => Cart::instance('wishlist')->count()
        ]);
    }
}
