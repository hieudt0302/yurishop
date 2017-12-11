<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\MailTemplate;
use App\Models\MailTemplateTranslation;
use Illuminate\Support\Facades\Input;
use App\Models\Language;
use DB;
use Validator;

class MailTemplateController extends Controller
{
   	public function index(){
        $mailTemplates = MailTemplate::all();
        return view('admin.mail_templates.index',compact('mailTemplates'));
    }

    public function create(){
        $languages = Language::all();
        return view('admin.mail_templates.create',compact('languages'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
           

        $mailTemplate = new MailTemplate;
        $mailTemplate->name = $request->name;
        $mailTemplate->save();

        return redirect()->action(
            'Admin\MailTemplateController@edit', ['id' => $mailTemplate->id]
        );
    }

    public function edit($id)
    {
        $mailTemplate = MailTemplate::find($id);
        $languages = Language::all();
        
        $language_id = Input::get('language_id')??0;
        $tab = 1;
        $translation =  null;
        if(!empty( $language_id) &&   $language_id  > 0 ){
            $translation = MailTemplateTranslation::where('mail_template_id',$id)->where('language_id', $language_id)->withoutGlobalScopes()->first();
            $tab= 2;
        }

        return View('admin.mail_templates.edit',compact('mailTemplate','languages', 'translation','tab', 'language_id'));
        
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $mailTemplate = MailTemplate::find($id);
        $mailTemplate->name = $request->name;
        $mailTemplate->save();

        return redirect()->back()
        ->with('message', 'Mẫu đã được cập nhật!')
        ->with('status', 'success')
        ->withInput(['tab'=> 1]);
    }

    public function destroy($id){
        MailTemplateTranslation::where('mail_template_id', $id)->delete();
        MailTemplate::where('id', $id)->delete();
        return redirect()->route('admin.mail_templates.index')
        ->with('message', 'Xóa thành công ')
        ->with('status', 'success') ;
    }

    public function updateTranslation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'language_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        if(empty(Language::find($request->language_id))){
            return redirect()->back()
            ->with('message', 'Vui lòng chọn ngôn ngữ.')
            ->with('status', 'error')
            ->withInput(['tab'=> 2]);
        }

        $translation = MailTemplateTranslation::where('mail_template_id', $id)
        ->where('language_id', $request->language_id)->withoutGlobalScopes()
        ->first();
        
        if(!empty($translation)){
            $translation->title = $request->title_translate??'';
            $translation->content = $request->content_translate??'';
            $translation->save();
        }
        else{
            $mailTemplateTranslation = new MailTemplateTranslation();
            $mailTemplateTranslation->content = $request->title_translate??'';
            $mailTemplateTranslation->content = $request->content_translate??'';
            $mailTemplateTranslation->language_id = $request->language_id;
            $mailTemplateTranslation->mail_template_id = $id;
            $mailTemplateTranslation->save();
        }
        
        return redirect()->back()
        ->with('message', 'Cập nhật nội dung mới thành công')
        ->with('status', 'success')
        ->withInput(['tab'=> 2]);
    }  
}