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
    public function update(Request $request, $id)
    {
        $info_page = InfoPage::find($id);
        $this->validate($request,['title' => 'required',
                                  'slug' => 'required'
                                ]);

        // Update data bảng info-page
        $info_page->title = $request->input("title");
        $info_page->slug = $request->input("slug");
        $info_page->save();

        $info_page_translations = $info_page->translations()->get();
        foreach ($info_page_translations as $info_page_translation){
            if (!empty($request->input($info_page_translation->language_id.'-title'))) {
                $info_page_translation->title = $request->input($info_page_translation->language_id.'-title');  
            }
            if (!empty($request->input($info_page_translation->language_id.'-content'))) {
                $info_page_translation->content = $request->input($info_page_translation->language_id.'-content');  
            }            
            $info_page_translation->save();
        }
        
        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info_page = InfoPage::find($id);
        $info_page->delete();
        session()->flash('success_message', "Xóa thành công!");        
        return redirect()->route('admin.info-pages.index'); 
    }
}
