<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('danger_message', 'ERROR-INPUT: Code EI1003')
            ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender ==="M"?true:false;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->company = $request->company;
        $user->vat = $request->vat;
        $user->newsletter = $request->newsletter;

        $user->save();

        return redirect()->back()
        ->with('success_message', 'Đã Cập Nhật Thông Tin Tài Khoản');
    }

    public function Orders()
    {
        return View('front.myaccount.orders');
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

    public function ChangePasswordUpdate()
    {
        return View('front.myaccount.changepassword');
    }
}
