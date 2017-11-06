<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Subscribe;
use App\Models\MailTemplate;
use App\Models\MailTemplateTranslation;
use App\Models\Language;
use DB;
use Mail;

class SubscribeController extends Controller
{
   	public function index(){
        $mailTemplates = MailTemplate::all();
        return view('admin.subscribes.index',compact('mailTemplates'));
    }

    public function send_mail(Request $request){
        $this->validate($request,['mail_temp_id' => 'required']);   
        $emails = Subscribe::all();
        $mail_temp_id = $request->mail_temp_id;
        $promotion_content = '';
        if($mail_temp_id != '' && $mail_temp_id != null){
            foreach($emails as $email){
                $language = Language::where('code',$email->locale)->first();
                if(!empty($language)){
                    $language_id = $language->id; 
                    $promotion_content = MailTemplateTranslation::where('mail_template_id',$mail_temp_id)->where('language_id',$language_id)->first()->content;
                    $data = array('email' => $email->email, 'content' => $promotion_content);
                    Mail::send('admin/subscribes/mail_template', $data, function($message) use ($data){
                        $message->to($data['email'])->subject('Mail khuyến mãi');
                    }); 
                }                
            } 
        }
        
        session()->flash('success_message', 'Send mail successfully!');

        return redirect()->back();    
    }
}