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
        $this->validate($request,['mail_temp_id' => 'required|integer|min:1']);   

        // foreach(Subscribe::select('locale') as $ $locale){
        //     $language = Language::where('code',$locale)->first();
        //     if(!empty($language)){
        //         $mail_template = MailTemplateTranslation::where('mail_template_id', $request->mail_temp_id)
        //             ->where('language_id',$language_id)->first();

        //         if(strlen($mail_template->content) <= 0 || empty($mail_template))
        //             continue;

        //         $emailAddresses =  Subscribe::where('locale', $locale)->toArray();

        //         $data = array('email' => $email->email, 'content' => $mail_template->content);

        //         Mail::send('admin/subscribes/mail_template', $data, function($message) use ($data, $mail_template){
        //             $message
        //             ->to($data['email'])
        //             ->subject(strlen($mail_template->title)> 0? $mail_template->title :'Pokofarms: Tin khuyến mãi');
        //         }); 

        //     }
        // }

        $mail_temp_id = $request->mail_temp_id;
        $mail_template = null;
        if($mail_temp_id != '' && $mail_temp_id != null){
            foreach($emails as $email){
                $language = Language::where('code',$email->locale)->first();
                if(!empty($language)){
                    $language_id = $language->id; 
                    $mail_template = MailTemplateTranslation::where('mail_template_id',$mail_temp_id)->where('language_id',$language_id)->first();

                    if(strlen($mail_template->content) <= 0 || empty($mail_template))
                        continue;
                    $data = array('email' => $email->email, 'content' => $mail_template->content);
                    Mail::send('admin/subscribes/mail_template', $data, function($message) use ($data, $mail_template){
                        $message
                        ->to($data['email'])
                        ->subject(strlen($mail_template->title)> 0? $mail_template->title :'Pokofarms: Tin khuyến mãi');
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