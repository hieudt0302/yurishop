<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\MailTemplate;
use App\Models\MailTemplateTranslation;
use App\Models\Language;
use DB;

class MailTemplateController extends Controller
{
   	public function index(){
        $mailTemplates = MailTemplate::all();
        return view('admin.mail_templates.index',compact('mailTemplates'));
    }

    public function create(){
        $language_list = Language::all();        
        return view('admin.mail_templates.create',compact('language_list'));
    }

    public function store(Request $request){
        $this->validate($request,['name' => 'required',
                                  //'content' => 'required'                              
                                ]);               

        $mailTemplate = new MailTemplate;
        $mailTemplate->name = $request->name;
        $mailTemplate->save();

        $language_list = Language::all();
        foreach ($language_list as $language){ 
            $mail_temp_translation = new MailTemplateTranslation;
            $mail_temp_translation->mail_temp_id = $mailTemplate->id;
            $mail_temp_translation->language_id = $language->id;
            $mail_temp_translation->content = $request->input($language->id.'-content');
            $mail_temp_translation->save();
        }        

        session()->flash('success_message', "Thêm mới thành công !");
        return redirect()->back();
    }

    public function edit($id)
    {
        $mailTemplate = MailTemplate::find($id);
        $language_list = Language::all();
        $mail_temp_translations = $mailTemplate->translations()->get();
        return view('admin.mail_templates.edit',compact('mailTemplate','language_list','mail_temp_translations'));   
    }

    public function update($id, Request $request)
    {
        $mailTemplate = MailTemplate::find($id);

        $this->validate($request,['name' => 'required',
                                  'content' => 'required'                              
                                ]);     

        $mailTemplate->name = $request->name;
        $mailTemplate->save();

        $mail_temp_translations = $mailTemplate->translations()->get();
        foreach ($mail_temp_translations as $mail_temp_translation){
            if (!empty($request->input($mail_temp_translation->language_id.'-content'))) {
                $mail_temp_translation->content = $request->input($mail_temp_translation->language_id.'-content');
                $mail_temp_translation->save();
            }
        }        


        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->back(); 
    }
    public function destroy($id){
        $mailTemplate = MailTemplate::find($id);
        $mailTemplate->delete();

        session()->flash('success_message', "Xóa thành công !");
        return redirect()->route('admin.mail_templates.index'); 
    }
}