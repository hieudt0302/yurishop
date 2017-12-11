<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user_new = User::where('created_at', '>=', Carbon::today()->startOfWeek())->count();
        $order_new = Order::where('order_status', 1)->count();
        $order_wait = Order::where('order_status', 2)->count();
        $product_count = Product::count();
        
        
        return View('admin.dashboard.index',compact('order_new','order_wait','product_count','user_new'));
    }
}
