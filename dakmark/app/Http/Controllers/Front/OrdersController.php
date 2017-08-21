<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BookAddress;
use App\Models\Shop;
use \Cart as Cart;
use DB;
use Carbon\Carbon;

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
        //empty cart
        if (sizeof(Cart::content()) <= 0)
        {
            return abort(404);
        }

        $bookaddress = DB::table('bookaddress')->where('user_id',Auth::user()->id)->get();
        return view('front.orders.create', compact('bookaddress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Get data from blade
        $use_bookaddress = $request->input('use_bookaddress');
        $bookaddress_id = $request->input('bookaddress_id');     

        //Address
        $shipaddress = $request->input('shipaddress');
        $shipdistrict = $request->input('shipdistrict');
        $shipdcity = $request->input('shipcity');
        $shipphone = $request->input('shipphone');

        //NOTE
        $note = $request->input('ordernote');
        
        

        //Choose address
        if ($use_bookaddress === 'true')
        {
           

            $bookaddress = BookAddress::where('id', $bookaddress_id)->first();
            if(!$bookaddress)
            {
                return redirect()->back()
                ->with('message','Vui lòng nhập địa chỉ nhận hàng')
                ->with('status', 'danger')
                ->withInput();
            }

            //Catch return bookaddress null
            $shipaddress = $bookaddress->address;
            $shipdistrict =$bookaddress->district;
            $shipdcity = $bookaddress->city;
            $shipphone =$bookaddress->phone;
        }
        else
        {
            $shipaddress = $request->input('shipaddress');
            $shipdistrict = $request->input('shipdistrict');
            $shipdcity = $request->input('shipcity');
            $shipphone = $request->input('shipphone');
        }
       
        echo "<script>console.log( 'Debug Objects: " . $use_bookaddress . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $bookaddress_id . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $shipaddress . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $shipdistrict . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $shipdcity . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $shipphone . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $note . "' );</script>";


        // create an order
        $user_id = Auth::user()->id;

    
        DB::beginTransaction();
        try
        {
            echo "<script>console.log( 'Return TOTAL AMOUNT: " . Cart::total() . "' );</script>";
            
            // Make order
            $order_id = DB::table('orders')->insertGetId([
                'totalamount' => Cart::total(2,'.',''),
                'status' => 1,
                'shipaddress' => $shipaddress,
                'shipdistrict' => $shipdistrict,
                'shipcity' => $shipdcity,
                'shipphone' => $shipphone,
                'note' => $note,
                'user_id' => $user_id , 
                'usercreated' => $user_id , 
                'userupdated' =>  $user_id , 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);
           

            echo "<script>console.log( 'Return Order ID: " . $order_id . "' );</script>";

            // Make orderdetails
            // get item from session cart
            foreach (Cart::content() as $item)
            {
                $shop = DB::table('shops')->where('name', $item->options->shop)->first();
                echo "<script>console.log( 'Return SHOP NAME: " . $item->options->shop . "' );</script>";
                
                if(empty($shop))
                {
                    //TODO: insert new shop
                    $shop_id= DB::table('shops')->insertGetId(
                        ['name' => $item->options->shop]
                    );
                }
                else
                {
                    $shop_id = $shop->id;
                }

                echo "<script>console.log( 'Return Shop ID: " . $shop_id . "' );</script>";

                DB::table('orderdetails')->insert([
                    'productname' => $item->name,
                    'size'=> $item->options->size,
                    'color'=>$item->options->color,
                    'quantity'=>$item->qty,
                    'unitprice'=>$item->price,
                    'total'=> $item->subtotal,
                    'image'=>$item->options->image,
                    'url'=>$item->options->url,
                    'order_id'=> $order_id,
                    'shop_id' => $shop_id,
                    'usercreated' => $user_id , 
                    'userupdated' =>  $user_id ,    
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            DB::commit();
            echo "<script>console.log( 'Return Commit!' );</script>";
        }       
        catch (\Exception $e)
        {
            echo "<script>console.log( 'Return Exception: " . $e . "' );</script>";
            DB::rollBack();
           
            return redirect()->back()
            ->with('message','Đã xảy ra lỗi, không thể tạo đơn hàng')
            ->with('status', 'danger')
            ->withInput();
        }

        //remove cart
        Cart::destroy();

        //return order list
        return redirect()->route('front.orders.index')
        ->with('success','Bạn đã gửi tạo mới đơn hàng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::where('id',$id)
        ->where('user_id',Auth::user()->id)
        ->first();

        $orderdetails = OrderDetail::where('order_id',$order->id)->get();
       

        return view('front.orders.show',compact('order','orderdetails'));
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
       // echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
    }

    public function itemdestroy($id)
    {
        echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
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
