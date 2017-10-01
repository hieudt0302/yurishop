<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\FAQ;
use DB;

class FAQController extends Controller
{
    public function faqList(){
        $faqs = FAQ::orderBy('sort_order', 'asc')->get();
        return view('admin.faq.faq_list')->with(["faqs" => $faqs]);
    }
    public function addFAQ(){
        return view('admin.faq.add_faq');
    } 
    public function insertFAQ(Request $request){
        $this->validate($request,['question' => 'required',
                                  'answer' => 'required'
                                ]);

        // Insert data vào bảng faq
        $faq = new FAQ;
        $faq->question = $request->question;
        $faq->en_question = $request->en_question;
        $faq->answer = $request->answer;
        $faq->en_answer = $request->en_answer;
        $faq->sort_order = $request->sort_order;
        $faq->is_show = $request->is_show;
        $faq->create_at = date("Y-m-d H:i:s",time());
        $faq->save();

        session()->flash('success_message', "Thêm faq thành công !");
        return redirect()->route('admin.faq');
    }  
    public function editFAQ($faq_id)
    {
        $faq = FAQ::find($faq_id);
        return view('admin.faq.edit_faq')->with(["faq" => $faq]); 
    }
    public function updateFAQ($faq_id, Request $request)
    {
        $faq = FAQ::find($faq_id);
        $this->validate($request,['question' => 'required',
                                  'answer' => 'required'
                                ]);

        // Update data bảng faq
        $faq->question = $request->question;
        $faq->en_question = $request->en_question;
        $faq->answer = $request->answer;
        $faq->en_answer = $request->en_answer;
        $faq->sort_order = $request->sort_order;
        $faq->is_show = $request->is_show;
        $faq->save();

        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.faq'); 
    }
    public function deleteFAQ($faq_id){
        $faq = FAQ::find($faq_id);
        $faq->delete();

        session()->flash('success_message', "Xóa faq thành công !");
        return redirect()->route('admin.faq'); 
    }
}
