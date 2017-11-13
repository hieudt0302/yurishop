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
        $email_subscribed = Subscribe::all();
        return view('admin.subscribes.index',compact('email_subscribed'));
    }

   	public function send_mail(){
        $mailTemplates = MailTemplate::all();
        return view('admin.subscribes.send_mail',compact('mailTemplates'));
    }

    public function send_mail_perform(Request $request){
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
                    if(empty($promotion_content))
                        continue;
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

    public function destroy($id){
        Subscribe::destroy($id);
        session()->flash('success_message', "Đã xóa email ra khỏi danh sách đăng ký!");        
        return redirect()->route('admin.subscribes.index'); 
    }

    // Tìm kiếm email
    public function search(Request $request){
        $email = $request->input('email'); 
        
        if($email != ''){
            $email_subscribed = Subscribe::where("email", "LIKE", "%$email%")->paginate(21);   
        }
        else{
             $email_subscribed = Subscribe::orderBy('email','ASC')->paginate(21);
        }
        return view('admin.subscribes.index',compact('email_subscribed'))
               ->with('i', ($request->input('page', 1) - 1) * 21);
    }
}