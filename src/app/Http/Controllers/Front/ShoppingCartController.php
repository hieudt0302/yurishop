<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart\Cart;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function cart()
     {
         return View("front/shoppingcart/cart");
     }

     public function wishlist()
     {
         return View("front/shoppingcart/wishlist");
     }
}
