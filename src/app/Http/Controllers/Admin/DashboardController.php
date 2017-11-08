<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user_new = User::where('created_at', '>=', Carbon::today()->startOfWeek())->count();
        $order_new = Order::where('status', 0)->count();
        $order_wait = DB::table('orders')->where('status', 1)->count();

        return View('admin.dashboard.index',compact('order_new','order_wait','user_new'));
    }
}
