<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BookAddress;
use Validator;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->filter($request);
    }

    public function find(Request $request)
    {
        return $this->filter($request);
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
        $order = Order::find($id);
        $tab =1;
        return view('admin/orders/show',compact('order','tab'));
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

    public function DetailUpdateItem(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'price' => 'numeric|min:0',
            'quantity' => 'numeric|min:1',
            'discount' => 'numeric|min:0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $order  = Order::find($id);
        $detail  = OrderDetail::find($request->order_detail_id);
        $detail->price = $request->price;
        $detail->quantity = $request->quantity;
        $detail->discount = $request->discount;
        $detail->total =  ($detail->price * $detail->quantity) - $detail->discount;
        $detail->save();

        $order->order_total = $order->orderdetails->sum('total');
        $order->save();

        $tab = 4;

        return view('admin/orders/show',compact('order','tab'))
        ->with('message', 'Cập nhật sản phẩm thành công!')
        ->with('status', 'success');
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
    public function DetailDestroy($id, $detail_id)
    {
        $order  = Order::find($id);

        $detail = OrderDetail::find($detail_id);
        $detail->delete();

        $order->order_total = $order->orderdetails->sum('total');
        $order->save();

        $tab= 4;

        return view('admin/orders/show',compact('order','tab'))
        ->with('message', 'Xóa một sản phẩm trong đơn hàng thành công!')
        ->with('status', 'success');
    }
    public function filter(Request $request)
    {
        $order_start_date = $request->order_start_date;
        $order_end_date = $request->order_end_date;
        $customer_name = $request->customer_name;
        $billing_email = $request->billing_email;
        $order_no = $request->order_no;

        $orders_status = $request->orders_status;
        $shippings_status = $request->shippings_status;
        $payments_status = $request->payments_status;


        $query = DB::table('orders')
            ->join('book_addresses', 'book_addresses.id', '=', 'orders.billing_address_id')
            ->select('orders.*', 'book_addresses.last_name', 'book_addresses.first_name', 'book_addresses.email', 'book_addresses.phone');
        
        if (strlen($order_start_date) > 0) {
            $start = date('Y-m-d'.' 00:00:00', strtotime($order_start_date));
            $query->where('orders.order_start_date', '>=', $start);
        }
        if (strlen($order_end_date) > 0) {
            $end = date('Y-m-d'.' 23:59:59', strtotime($order_end_date));
            $query->where('orders.order_end_date', '<=', $end);
        }

        if (strlen($customer_name) > 0) {
            $query->where(function ($subQuery) use ($customer_name) {
                $subQuery->where('book_addresses.first_name', 'LIKE', '%'.$customer_name.'%');
                $subQuery->orWhere('book_addresses.last_name', 'LIKE', '%'.$customer_name.'%');
            });
        }

        if (strlen($billing_email) > 0) {
            $query->where('book_addresses.email', '<=', $billing_email);
        }

        if (count($orders_status) > 0) {
            $query->whereIn('order_status', $orders_status);
        }

        if (count($payments_status) > 0) {
            $query->whereIn('payment_status', $payments_status);
        }

        if (count($shippings_status) > 0) {
            $query->whereIn('shipping_status', $shippings_status);
        }

        if (strlen($order_no) > 0) {
            $query->where('orders.order_no', $order_no);
        }


        $orders = $query->paginate(21);
        $request->flashOnly(['order_start_date', 'order_end_date', 'customer_name', 'billing_email', 'order_no','orders_status','shippings_status','payments_status']);

        $tab = 1;

        return View('admin.orders.index', compact('orders','tab'))
        ->with('i', ($request->input('page', 1) - 1) * 21);
    }

    public function CancelOrderStatus($id)
    {
        $order = Order::find($id);
        $order->order_status = 3; //refer Lang/method.php
        $order->save();
        
        return view('admin/orders/show',compact('order'));
    }

    public function ChangeOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status =  $request->order_status; //refer Lang/method.php
        $order->save();
        
        $tab = 1;
        return view('admin/orders/show',compact('order','tab'));
    }
    public function ChangePaymentStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->payment_status =  $request->payment_status; //refer Lang/method.php
        $order->save();
        
        $tab = 1;
        return view('admin/orders/show',compact('order','tab'));
    }
    public function ChangeShippingStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->shipping_status =  $request->shipping_status; //refer Lang/method.php
        $order->save();
        
        $tab = 1;
       
        return view('admin/orders/show',compact('order','tab'));
    }
    public function UpdateOrderFee(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_tax =  $request->order_tax; 
        $order->order_shipping_price =  $request->order_shipping_price; 
        $order->order_total = $order->order_tax  + $order->order_shipping_price +  $order->orderdetails->sum('total');
        $order->save();
        $tab = 1;
        return view('admin/orders/show',compact('order','tab'));
    }

    public function UpdateBillingAddress(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'emai' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $order = Order::find($id);
        $this->UpdateAddress($request, $order->billing_address_id);
        $tab = 2;
        return view('admin/orders/show',compact('order','tab'))
        ->with('message', 'Cập nhật địa chỉ thanh toán của khách hàng thành công!')
        ->with('status', 'success');
    }

    public function UpdateShippingAddress(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'emai' => 'email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $order = Order::find($id);
        $this->UpdateAddress($request, $order->shipping_address_id);

        $tab = 3;

        return view('admin/orders/show',compact('order','tab'))
        ->with('message', 'Cập nhật địa chỉ vận chuyển của khách hàng thành công!')
        ->with('status', 'success');
    }

    public  function UpdateAddress(Request $request, $id)
    {
        $address = BookAddress::find($id);
        
        $address->company =  $request->company??'';
        $address->first_name=  $request->first_name??'';
        $address->last_name=  $request->last_name??'';
        $address->address1 =$request->address1??'';
        $address->address2 =$request->address2??'';
        $address->district = $request->district??'';
        $address->city = $request->city??'';
        $address->state_province =$request->state_province??'';
        $address->country =$request->country??'';
        $address->zipcode = $request->zipcode??'';
        $address->phone = $request->phone??'';
        $address->fax = $request->fax??'';
        $address->email = $request->email??'';

        $address->save();
    }

    
}
