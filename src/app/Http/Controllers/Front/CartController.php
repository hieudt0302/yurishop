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
            'sciItemId' => 'required',
            'newQuantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1002',
                'status' => 'error',
                'type' => 'update',
                'newCartItemCount' => Cart::count(),
                'showCheckoutButtons'=>true
            ]);
        }
       
        Cart::update($request->sciItemId, $request->newQuantity);
        
        return response()->json([
            'message' => 'Đã thêm '. $request->newQuantity .' sản phẩm vào giỏ hàng!',
            'status' => 'success',
            'type' => 'update',
            'newCartItemCount' => Cart::count(),
            'showCheckoutButtons'=>true
        ]);
    }

    public function DeleteCartItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sciItemId' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'ERROR-INPUT: Code EI1001',
                'status' => 'error',
                'type' => 'delete',
                'newCartItemCount' => Cart::count(),
                'rowId' => $request->sciItemId,
                'showCheckoutButtons'=>true
            ]);
        }
       
        Cart::remove($request->sciItemId);
        
        return response()->json([
            'message' => 'Đã xóa sản phẩm vào khỏi hàng!',
            'status' => 'success',
            'type' => 'delete',
            'newCartItemCount' => Cart::count(),
            'rowId' => $request->sciItemId,
            'showCheckoutButtons'=>true
        ]);
    }
    
    public function MoveItemBetweenCartAndWishlist(Request $request)
    {
        ///TODO: Remove move cart item to wishlist


        return response()->json([
            'message' => 'Đã di chuyển sản phẩm sang danh sách mong ước!',
            'status' => 'success',
            'newCartItemCount' => Cart::count(),
            'newWishlistItemCount' => Cart::instance('wishlist')->count()
        ]);
    }
}
