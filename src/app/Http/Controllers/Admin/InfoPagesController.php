<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\InfoPage;
use App\Models\InfoPageTranslation;
use App\Models\Language;
use DB;

class InfoPagesController extends Controller
{

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $info_pages = InfoPage::orderBy('id', 'desc')->paginate(10);
        return view('admin.info-pages.index',compact('info_pages'))
        ->with('i', ($request->input('page', 1) - 1) * 10);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language_list = Language::all();        
        return view('admin.info-pages.create',compact('language_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['title' => 'required',
                                  'slug' => 'required'
                                ]);

        // Update data bảng info-page
        $info_page = new InfoPage;        
        $info_page->title = $request->input("title");
        $info_page->slug = $request->input("slug");   
        $info_page->save();

        $language_list = Language::all();
        foreach ($language_list as $language){ 
            $info_page_translation = new InfoPageTranslation;
            $info_page_translation->info_page_id = $info_page->id;
            $info_page_translation->language_id = $language->id;
            $info_page_translation->title = $request->input($language->id.'-title');            
            $info_page_translation->content = $request->input($language->id.'-content');
            $info_page_translation->save();
        }
        session()->flash('success_message', "Thêm mới thành công !");
        return redirect()->back(); 
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
        $info_page = InfoPage::find($id);
        $info_page_translations = $info_page->translations()->get();
        return view('admin.info-pages.show',compact('language_list','info_page','info_page_translations'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info_page = InfoPage::find($id);
        $language_list = Language::all();
        $info_page_translations = $info_page->translations()->get();
        return view('admin.info-pages.edit',compact('info_page','language_list','info_page_translations'));                  
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
