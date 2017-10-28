<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use App\Models\Faq;
use App\Models\FaqTranslation;
use App\Models\Language;
use DB;
use Validator;
class FaqController extends Controller
{

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $faqs = Faq::orderBy('id', 'desc')->paginate(10);
        return view('admin.faqs.index',compact('faqs'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language_list = Language::all();        
        return view('admin.faqs.create',compact('language_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required'            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }     
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->is_show = $request->is_show??0;       
        $faq->save();

     
        return redirect()->action(
            'Admin\FaqController@edit', ['id' => $faq->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $language_list = Language::all();
        $faq_translations = FaqTranslation::where('faq_id',$id)->orderBy('language_id','asc')->get();
        return view('admin.faqs.show',compact('language_list','faq_translations'));        

    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        $languages = Language::all();
        
        $language_id = Input::get('language_id')??0;
        $tab = 1;
        $translation =  null;
        if(!empty( $language_id) &&   $language_id  > 0 ){
            $translation = FaqTranslation::where('faq_id',$id)->where('language_id', $language_id)->withoutGlobalScopes()->first();
            $tab= 2;
        }
        return View('admin.faqs.edit',compact('faq','languages', 'translation','tab', 'language_id'));             
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
        $validator = Validator::make($request->all(), [
            'question' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $faq = Faq::find($id);
        $faq->question = $request->title;
        $faq->is_show = $request->is_show;
        $faq->save();
              
        return redirect()->back()
        ->with('message', 'Faq đã được cập nhật')
        ->with('status', 'success')
        ->withInput(['tab'=> 1]);
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

        $translation = FaqTranslation::where('faq_id', $id)
        ->where('language_id', $request->language_id)->withoutGlobalScopes()
        ->first();
        
        if(!empty($translation)){
            $translation->question = $request->question_translate??'';
            $translation->answer = $request->answer_translate??'';
            $translation->save();
        }
        else{
            $faqTranslation = new FaqTranslation();
            $faqTranslation->question = $request->question_translate??'';
            $faqTranslation->answer = $request->answer_translate??'';
            $faqTranslation->language_id = $request->language_id;
            $faqTranslation->faq_id = $id;
            $faqTranslation->save();
        }
        
        return redirect()->back()
        ->with('message', 'Cập nhật nội dung mới thành công')
        ->with('status', 'success')
        ->withInput(['tab'=> 2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        session()->flash('success_message', "Xóa thành công!");        
        return redirect()->route('admin.faqs.index'); 
    }
}
