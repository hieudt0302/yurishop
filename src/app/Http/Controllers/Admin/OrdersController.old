<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderShop;
use Validator;
use DB;
use Carbon\Carbon;
class OrdersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
          $customer = $request->input('customer');  
          $fromDate = $request->input('from');         
          $toDate = $request->input('to');
          $status = $request->get('status');
 
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
            //  ->where('user_id', Auth::user()->id)
             ->whereBetween('created_at', [$from, $to])
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($fromDate))
         {
             $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate)); 
              $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->where('created_at', '>=', $from)
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($toDate))
         {
             $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 
 
             $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->where('created_at', '<=', $to)
             ->whereIn('status', $statusIn )
             ->paginate(10);
         }
         else
         {
             $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
 
         return view('admin.orders.index',compact('orders','fromDate','toDate','status'))
         ->with('i', ($request->input('page', 1) - 1) * 10);
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
        $order = Order::where('id',$id)->first();
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('admin.orders.show',compact('order','orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        $freight1 = $request->input('freight1');
        $freight2 = $request->input('freight2');
        $service = $request->input('service');
        $deposit = $request->input('deposit');

        $order = Order::find($id);
        $order->freight1= $freight1;
        $order->freight2= $freight2;
        $order->service= $service;
        $order->deposit= $deposit;

        $order->save();

        return redirect()->back()
        ->with('message','Lưu thay đổi thành công!')
        ->with('status', 'success');
    }
    public function sendshop(Request $request, $id)
    {
        $freight1 = $request->input('freight1');
        $freight2 = $request->input('freight2');
        $service = $request->input('service');
        $deposit = $request->input('deposit');

        $order = Order::find($id);
        $order->freight1= $freight1;
        $order->freight2= $freight2;
        $order->service= $service;
        $order->deposit= $deposit;
        $order->save();

        // $orderdetails =OrderDetail::where('order_id', $order->id)
        //                             ->groupBy('shop_id')->get();

        $orderdetails_group = DB::table('orderdetails')
        ->select(DB::raw('shop_id'), DB::raw('sum(total) as total'))
        ->groupBy(DB::raw('shop_id') )
        ->get();

        $orderdetails = OrderDetail::where('order_id',$order->id)->get();

        $user_id = Auth::user()->id;
        
        DB::beginTransaction(); // LIVE STREAM
        try
        {
            foreach($orderdetails as $os)
            {
                $ordershop = OrderShop::where('shop_id',$os->shop_id)->where('status',1)->first();

                if(!empty($ordershop))
                {
                    DB::table('ordershops')->where('id',$ordershop->id)->update(['totalamount' => $ordershop->totalamount + $os->total]);
                    DB::table('orderdetails')->where('id',$os->id)->update(['ordershop_id' => $ordershop->id]);
                }
                else
                {
                    $shop_id = DB::table('ordershops')->insertGetId([
                                'freight1'=>0,  
                                'freight2'=>0,
                                'totalamount' => $os->total,
                                'status' => 1,
                                'landingcode'=>'',
                                'orderdate'=>Carbon::now(),
                                'shop_id' =>  $os->shop_id,
                                'usercreated' => $user_id , 
                                'userupdated' =>  $user_id , 
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                   DB::table('orderdetails')->where('id',$os->id)->update(['ordershop_id' => $shop_id]);
                 }
            }
            DB::table('orders')->where('id',$id)->update(['status' =>2]);
            // foreach ($orderdetails_group as $item) {
                
            //       $shop_id = DB::table('ordershops')->insertGetId([
            //         'freight1'=>0,  
            //         'freight2'=>0,
            //         'totalamount' => $item->total,
            //         'status' => 1,
            //         'shop_id' =>  $item->shop_id,
            //         'usercreated' => $user_id , 
            //         'userupdated' =>  $user_id , 
            //         'created_at' => Carbon::now(),
            //         'updated_at' => Carbon::now()
            //     ]);
    
            //     foreach($orderdetails as $os)
            //     {
            //         if($os->shop_id===$item->shop_id)
            //         DB::table('orderdetails')->where('id',$os->id)->update(['ordershop_id' => $shop_id]);
            //     }
            // }
            DB::commit();
        }
            catch (\Exception $e)
            {
                DB::rollBack();
               
                return redirect()->back()
                ->with('message',$e->getMessage())//Đã xảy ra lỗi, không thể tạo đơn hàng
                ->with('status', 'danger')
                ->withInput();
            }
     
        return redirect()->back()
        ->with('message','Lưu thay đổi và tạo đơn hàng theo cửa hàng thành công!')
        ->with('status', 'success');
    }

    public function ajustquantity(Request $request, $id)
    {
        
            $validator = Validator::make($request->all(), [
                'quantity' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                session()->flash('error_message', 'Số lượng không phù hợp!');
                return response()->json(['success' => false]);
            }

            $order_detail = OrderDetail::find($id);
            
            $order_detail->quantity = $request->quantity;
            
            $order_detail->save();

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
        $order =  Order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->route('admin.orders.index')
                        ->with('message','Bạn vừa hủy một đơn hàng!')
                        ->with('status', 'success');
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
         $customer = $request->input('customer');  
          $fromDate = $request->input('fromDate');         
          $toDate = $request->input('toDate');
          $status = $request->get('status');
        
         echo "<script>console.log( 'Debug Objects: " . $customer . "' );</script>";
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
            //  ->where('user_id', Auth::user()->id)
             ->whereBetween('created_at', [$from, $to])
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($fromDate))
         {
             $from = date('Y-m-d'.' 00:00:00', strtotime($fromDate)); 
              $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->where('created_at', '>=', $from)
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($toDate))
         {
             $to = date('Y-m-d'.' 23:59:59', strtotime($toDate)); 
 
             $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->where('created_at', '<=', $to)
             ->whereIn('status', $statusIn )
             ->paginate(10);
         }
         else
         {
             $orders = Order::orderBy('id','DESC')
            //  ->where('user_id', Auth::user()->id)
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
 
         return view('admin.orders.index',compact('orders','fromDate','toDate','status'))
         ->with('i', ($request->input('page', 1) - 1) * 10);
     }
}
