<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use App\Models\InfoPage;
use App\Models\InfoPageTranslation;
use App\Models\Language;
use Validator;
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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|string|min:5',
        ],
        [
            'title.required' => 'Không được để trống tên sản phẩm.',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        $info_page = new InfoPage;        
        $info_page->title = $request->input("title");
        $info_page->slug = $request->input("slug");   
        $info_page->save();
       
        return redirect()->action(
            'Admin\InfoPagesController@edit', ['id' => $info_page->id]
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
        $languages = Language::all();
        $language_id = Input::get('language_id')??0;
        $tab = 1;
        $translation =  null;

        if(!empty( $language_id) &&   $language_id  > 0 ){
            $translation = InfoPageTranslation::where('info_page_id',$id)->where('language_id', $language_id)->withoutGlobalScopes()->first();
            $tab= 2;
        }
        return View('admin.info-pages.edit',compact('info_page','languages', 'translation','tab','language_id'));            
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
            'title' => 'required',
            'slug' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $info_page = InfoPage::find($id);
        
        $info_page->title = $request->title;
        $info_page->slug = $request->slug;
     
        $info_page->save();

        return redirect()->back()
        ->with('message', 'Bài viết đã được cập nhật')
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

        $translation = InfoPageTranslation::where('info_page_id', $id)
        ->where('language_id', $request->language_id)->withoutGlobalScopes()
        ->first();
        if(!empty($translation)){
            $translation->title = $request->title_translate??'';
            $translation->content = $request->content_translate??'';
            $translation->description = $request->description_translate??'';
            $translation->save();
        }
        else{
            $infoPageTranslation = new InfoPageTranslation();
            $infoPageTranslation->title = $request->title_translate??'';
            $infoPageTranslation->content = $request->content_translate??'';
            $infoPageTranslation->description = $request->description_translate??'';
            $infoPageTranslation->language_id = $request->language_id;
            $infoPageTranslation->info_page_id = $id;
            $infoPageTranslation->save();
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
        $info_page = InfoPage::find($id);
        $info_page->delete();
       
        return redirect()->route('admin.info-pages.index')
        ->with('message', 'Xóa thành công!')
        ->with('status', 'success');
    }
    public function GenerateSlug($title)
    {
        $slug = str_slug($title, "-");
        if(InfoPage::where('slug',$slug)->count() >0 )
        {
            $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
        }
        return response()->json([
            'slug' =>  $slug,
            'status' => 'success'
        ]);
    }
}
