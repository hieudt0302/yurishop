<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\BookAddress;
use Validator;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Info()
    {
        return View('front.myaccount.info');
    }
    public function InfoUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'day' => 'numeric|min:1|max:31',
            'month' => 'numeric|min:1|max:12',
            'year' => 'numeric|min:1900|max:2500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        if(!empty($request->day) && !empty($request->month)&& !empty($request->year))
        {
            $user->date_of_birth= date_create($request->year.'-'.$request->month.'-'.$request->day);
        }
        $user->gender = $request->gender ==="M"?true:false;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->vat = $request->vat;
        $user->newsletter = $request->newsletter;

        $user->save();

        return redirect()->back()
        ->with('message', 'Đã Cập Nhật Thông Tin Tài Khoản')
        ->with('status', 'success');
    }

    public function Orders()
    {
        $orders = Order::where('customer_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        return View('front.myaccount.orders', compact('orders'));
    }

    public function Addresses()
    {
        return View('front.myaccount.addresses');
    }

    public function AddressCreate()
    {
        return View('front.myaccount.address_create');
    }

    public function AddressStore()
    {
        
    }

    public function AddressEdit($id)
    {
        $address= BookAddress::find($id);
        return View('front.myaccount.address_edit',compact('address'));
    }

    public function AddressUpdate()
    {
        
    }

    public function ChangePassword()
    {
        return View('front.myaccount.changepassword');
    }

    public function ChangePasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator);
        }

        $user = Auth::user();
       
        if (Hash::check($request->new_password,  $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        }else{
            return redirect()->back()
            ->with('message', 'Mật khẩu cũ không đúng!')
            ->with('status', 'danger');
        }

        return redirect()->back()
        ->with('message', 'Thay đổi mật khẩu thành công!') 
        ->with('status', 'success');
    }


    public function destroy($id)
    {
        $address = BookAddress::find($id);
        $address->delete();
        return View('front.myaccount.addresses');
    }
}
