<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Setting;
use App\Models\MailTemplate;
use DB;

class SettingController extends Controller
{
    public function edit()
    {
        $mail_temps = MailTemplate::all();
        return view('admin.settings.edit',compact('mail_temps'));
    }

    public function update(){
        
        $inputs = Request::all();
        foreach ($inputs as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->back();               
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
