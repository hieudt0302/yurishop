<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Validation\Rule;
use App\Models\Setting;
use DB;

class SettingController extends Controller
{
    public function edit(){
        $inputs = Input::all();
        foreach ($inputs as $key => $value) {
            DB::table('settings')->where('key', $key)->update(['value' => $value]);
            $exists = DB::table('settings')->where('key', $key)->count();
            if ($exists == 0) {
               DB::table('settings')->insert(['key' => $key, 'value' => $value]);
            }
        }               
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }
}
