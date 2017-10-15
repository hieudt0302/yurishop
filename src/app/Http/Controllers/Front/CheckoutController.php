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
        ///TODO: Working on it...
       
            $validator = Validator::make($request->all(), [
                'contact' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                ->with('message', 'ERROR-INPUT: Code EI1003')
                ->with('status', 'danger')
                ->withInput();
            }

            $address_id = DB::table('book_addresses')->insertGetId([
                'contact'=>  $request->contact??'',
                'address' =>$request->address??'',
                'district' => $request->district??'',
                'city' => $request->city??'',
                'country' =>$request->country??'',
                'zipcode' => $request->zipcode??'',
                'phone' => $request->phone??'',
                'fax' => $request->fax??'',
                'email' => $request->email??'',
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            session(['BillingAddressId' => $address_id]);

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
        ///TODO: Working on it...
            $validator = Validator::make($request->all(), [
                'contact' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                ->with('message', 'ERROR-INPUT: Code EI1003')
                ->with('status', 'danger')
                ->withInput();
            }

            $address_id = DB::table('book_addresses')->insertGetId([
                'company'=>  $request->contact??'',
                'first_name'=>  $request->contact??'',
                'last_name'=>  $request->contact??'',
                'address' =>$request->address??'',
                'district' => $request->district??'',
                'city' => $request->city??'',
                'country' =>$request->country??'',
                'zipcode' => $request->zipcode??'',
                'phone' => $request->phone??'',
                'fax' => $request->fax??'',
                'email' => $request->email??'',
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            session(['ShippingAddressId' => $address_id]);

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
        // $validator = Validator::make($request->all(), [
        //     'note' => 'string'
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //     ->with('message', 'ERROR-INPUT: Code EI1001')
        //     ->with('status', 'danger')
        //     ->withInput();
        // }

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
                'order_no'=> 'O2018-123',
                'order_start_date' => Carbon::now(),
                'order_end_date' =>Carbon::now(),
                'order_tax'=>0,
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
                    'discount'=>0,
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
            var_dump($e->getMessage()); die;
            return redirect()->back()
                ->with('message', 'ERROR-CREATE: Code EC1002')
                ->with('status', 'danger')
                ->withInput();
        }

        //Cart::destroy();
        //session()->flush();
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
        if(empty($order_id))
            return abort(404);

        session()->forget('OrderId');
        return View('front.checkout.complete',compact('order_id'));
    }

    public function CompleteNext(Request $request)
    {
        
    }
}
