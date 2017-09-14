<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductCat;
use App\Models\Seo;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front.products.index')->with('products', $products);
    }


}