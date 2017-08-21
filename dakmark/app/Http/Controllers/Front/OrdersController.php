<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use DB;

/*
    Status 
    1. Chưa xử lý
    2. Đang xử lý
    3. Hoàn tất
    4. Hủy
*/
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $fromDate = $request->input('from');         
         $toDate = $request->input('to');
         $status = $request->get('status');
         
         echo "<script>console.log( 'Debug Objects: " . $fromDate . "' );</script>";
          echo "<script>console.log( 'Debug Objects: " . $toDate . "' );</script>";
           echo "<script>console.log( 'Debug Objects: " . $status . "' );</script>";

         if(empty($status) || (int)$status===0)
         {
             $statusIn =[1,2,3,4];
         } 
         else
         {
             $statusIn=[$status];
         }
       
        if(!empty($fromDate) && !empty($toDate))
        {
            $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate));
            $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 
            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->whereBetween('created_at', [$from, $to])
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }
        elseif(!empty($fromDate))
        {
            $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate)); 
             $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->where('created_at', '>=', $from)
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }
        elseif(!empty($toDate))
        {
            $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 

            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->where('created_at', '<=', $to)
            ->whereIn('status', $statusIn )
            ->paginate(10);
        }
        else
        {
            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }

        return view('front.orders.index',compact('orders','fromDate','toDate','status'))
        ->with('i', ($request->input('page', 1) - 1) * 10);

        //  $orders = Order::orderBy('id','DESC')->where('user_id', Auth::user()->id)->paginate(10);
        //  return view('front.orders.index',compact('orders'))
        // ->with('i', ($request->input('page', 1) - 1) * 10);
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
    public function show($id)
    {
        return view('front.orders.show');
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

    /**
     * Find the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request)
    {
         $fromDate = $request->input('fromDate');         
         $toDate = $request->input('toDate');
         $status = $request->get('status');

        echo "<script>console.log( 'Debug Objects: " . $fromDate . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $toDate . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $status . "' );</script>";

        if((int)$status===0)
         {
             $statusIn =[1,2,3,4];
         } 
         else
         {
             $statusIn=[$status];
         }
       
        if(!empty($fromDate) && !empty($toDate))
        {
            $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate));
            $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 
            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->whereBetween('created_at', [$from, $to])
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }
        elseif(!empty($fromDate))
        {
            $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate)); 
             $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->where('created_at', '>=', $from)
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }
        elseif(!empty($toDate))
        {
            $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 

            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->where('created_at', '<=', $to)
            ->whereIn('status', $statusIn )
            ->paginate(10);
        }
        else
        {
            $orders = Order::orderBy('id','DESC')
            ->where('user_id', Auth::user()->id)
            ->whereIn('status', $statusIn)
            ->paginate(10);
        }

        return view('front.orders.index',compact('orders','fromDate','toDate','status'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
