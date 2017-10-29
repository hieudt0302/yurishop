<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\BookAddress;
use App\Models\Order;
use App\Models\OrderDetail;

use Validator;
use \Cart as Cart;
use Carbon\Carbon;
use DB;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance. Require auth
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function BillingAddress()
    {
        $book_addresses = BookAddress::where('user_id', Auth::user()->id)->get();

        return View('front.checkout.billingaddress',compact('book_addresses'));
    }

    public function SelectBillingAddress()
    {
        session(['BillingAddressId' => Input::get('addressId',0)]);
        return redirect()->action('Front\CheckoutController@ShippingAddress');
    }

    public function BillingAddressCreateNew(Request $request)
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

           

        session(['BillingAddressId' =>  $this->CreateNewAddress($request)]);

        return redirect()->action('Front\CheckoutController@ShippingAddress');
    }

    public function ShippingAddress(Request $request)
    {
        $book_addresses = BookAddress::where('user_id', Auth::user()->id)->get();

        return View('front.checkout.shippingaddress', compact('book_addresses'));
    }

    public function SelectShippingAddress()
    {
        session(['ShippingAddressId' =>  Input::get('addressId',0)]);
        return redirect()->action('Front\CheckoutController@ShippingMethod');
    }

    public function ShippingAddressCreateNew(Request $request)
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

           
        session(['ShippingAddressId' => $this->CreateNewAddress($request)]);

        return redirect()->action('Front\CheckoutController@ShippingMethod');
    }

    public function ShippingMethod(Request $request)
    {        
        return View('front.checkout.shippingmethod');
    }

    public function ShippingMethodNext(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shippingoption' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('message', 'ERROR-INPUT: Code EI1001')
            ->with('status', 'danger')
            ->withInput();
        }

        session(['ShippingMethodId' => $request->shippingoption]);
        return redirect()->action('Front\CheckoutController@PaymentMethod');
    }

    public function PaymentMethod(Request $request)
    {
        return View('front.checkout.paymentmethod');
    }

    public function PaymentMethodNext(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paymentmethod' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('message', 'ERROR-INPUT: Code EI1001')
            ->with('status', 'danger')
            ->withInput();
        }

        session(['PaymentMethodId' => $request->paymentmethod]);
        return redirect()->action('Front\CheckoutController@Confirm');
    }

    public function Confirm(Request $request)
    {
        $billingAddressId = $value = session('BillingAddressId');
        $billingaddress = BookAddress::find($billingAddressId);

        $shippingAddressId = $value = session('ShippingAddressId');
        $shippingaddress = BookAddress::find($shippingAddressId);

        $shippingMethodId = $value = session('ShippingMethodId');

        $paymentMethodId = $value = session('PaymentMethodId');

        return View('front.checkout.confirm', compact('billingaddress', 'shippingaddress', 'shippingMethodId', 'paymentMethodId'));
    }

    public function ConfirmNext(Request $request)
    {

        $billingAddressId =  session('BillingAddressId');
        $shippingAddressId = session('ShippingAddressId');
        $shippingMethodId = session('ShippingMethodId');
        $paymentMethodId = session('PaymentMethodId');
        $note = $request->note;

        $order_id = null; //default order id before create

        DB::beginTransaction();
        try{
            // Make order
            $order_id = DB::table('orders')->insertGetId([
                'order_no'=> date("y") . date("m") . date("d"). date("h"). date("m"). date("s") .  Auth::user()->id,
                'order_start_date' => Carbon::now(),
                'order_end_date' =>Carbon::now(),
                'order_tax'=>Cart::tax(),
                'order_shipping_price'=>0,
                'order_total' =>Cart::total(2, '.', ''),
                'note' => $note,
                'customer_id' => Auth::user()->id,
                'billing_address_id' => $billingAddressId ,
                'shipping_address_id' =>  $shippingAddressId,
                'shipping_method' =>  $shippingMethodId,
                'payment_method' =>  $paymentMethodId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()

            ]);

             // Make orderdetails from session cart
             foreach (Cart::content() as $item) {
                DB::table('order_details')->insert([
                    'product_id' => $item->id,
                    'discount'=> 0,
                    'order_id'=> $order_id,
                    'price'=>$item->price,
                    'quantity'=>$item->qty,
                    'total'=>$item->subtotal,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
             }
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Cart::destroy();
        session()->forget('BillingAddressId');
        session()->forget('ShippingAddressId');
        session()->forget('ShippingMethodId');
        session()->forget('PaymentMethodId');


        session(['OrderId' => $order_id]);
        return redirect()->action('Front\CheckoutController@Complete');
    }

    public function Complete()
    {
        $order_id =  session('OrderId');
        $order_no = Order::find($order_id)->order_no??$order_id;
        
        if(empty($order_id))
            return abort(404);

        session()->forget('OrderId');
        return View('front.checkout.complete',compact('order_id','order_no'));
    }

    public function CompleteNext(Request $request)
    {
        
    }

    /*Extensions*/
    public  function CreateNewAddress(Request $request)
    {
        $address_id = DB::table('book_addresses')->insertGetId([
            'company'=>  $request->company??'',
            'first_name'=>  $request->first_name??'',
            'last_name'=>  $request->last_name??'',
            'address1' =>$request->address1??'',
            'address2' =>$request->address2??'',
            'district' => $request->district??'',
            'city' => $request->city??'',
            'state_province' =>$request->state_province??'',
            'country' =>$request->country??'',
            'zipcode' => $request->zipcode??'',
            'phone' => $request->phone??'',
            'fax' => $request->fax??'',
            'email' => $request->email??'',
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $address_id;
    }
}
