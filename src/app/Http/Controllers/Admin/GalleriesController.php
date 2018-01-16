<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Media;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use DB;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::paginate(21);

        return View('admin.galleries.index', compact('galleries'))
        ->with('i', (Input::get('page', 1) - 1) * 21);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $galleryCategory = Category::where('slug','galleries')->first();
        $categories = Category::where('parent_id',$galleryCategory->id??0)->get();     
        
        return View('admin.galleries.create',compact('categories'));
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
            'name' => 'required',
            'slug' => 'required|string|min:5|unique:galleries',
        ],
        [
            'name.required' => 'Không được để trống tên gallery',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
            'slug.unique' => 'Slug đã được sử dụng, vui lòng chọn slug khác.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $gallery = new Gallery();


        $gallery->name = $request->name;
        $gallery->slug = $request->slug;

        if(!empty($request->category_id))
            $gallery->category_id = $request->category_id;
        
        $gallery->published = $request->published??0;


        
        $gallery->save();            

      

        return redirect()->action(
            'Admin\GalleriesController@edit', ['id' => $gallery->id]
        );
        
    }

    

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        
        if(empty($gallery))
        {
            return redirect()->route('admin.galleries.index')
            ->with('message', 'Gallery không tồn tại!')
            ->with('status', 'danger');
        }

        $galleryCategory = Category::where('slug', 'galleries')->first();
        
        $categories = Category::where('parent_id', $galleryCategory->id??0)->get();
        $tab = 1;
        return View('admin/galleries/edit',compact('gallery','categories','tab'));
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
            'name' => 'required',
            'slug' => 'required|string|min:5|unique:galleries,slug,'.$id
            
        ],
        [
            'name.required' => 'Không được để trống tên gallery',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
            'slug.unique' => 'Slug đã được sử dụng, vui lòng chọn slug khác.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $gallery = Gallery::find($id);
        //
        $gallery->name = $request->name;
        $gallery->slug = $request->slug;


        if (!empty($request->category_id)) {
            $gallery->category_id = $request->category_id;
        }

        $gallery->published = $request->published??0;

        $gallery->save();

        return redirect()->back()
        ->with('message', 'Gallery đã được cập nhật.')
        ->with('status', 'success')
        ->withInput();
    }
    
  
    public function UpdateImage(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'm_order' => 'numeric|min:0',
            'm_id' => 'numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        

        DB::beginTransaction();
        try{
            DB::table('gallery_media')
            ->where('media_id',$request->m_id)
            ->update(['order' => $request->m_order]);
            //image
            DB::table('medias')
            ->where('id',$request->m_id)
            ->update(['name' => $request->m_name, 'description' => $request->m_description]);

            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()
            ->with('message', 'Không thể cập nhật thông tin hình ảnh!')
            ->with('status', 'danger');
        }

        //Gallery
        $gallery = Gallery::find($id);
        if(empty($gallery))
        {
            return redirect()->route('admin.galleries.index')
            ->with('message', 'Gallery không tồn tại!')
            ->with('status', 'danger');
        }
        $galleryCategory = Category::where('slug', 'galleries')->first();
        $categories = Category::where('parent_id', $galleryCategory->id??0)->get();
        $tab = 2;

        return view('admin/galleries/edit',compact('gallery','categories','tab'))
        ->with('message', 'Cập nhật thông tin hình ảnh thành công!')
        ->with('status', 'success');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if(!empty($gallery)){
            foreach($gallery->medias as $key => $media){
                $this->destroyImage($media->id);
            }
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
        ->with('message', 'Xóa một gallery thành công!')
        ->with('status', 'success');
    }
    
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'gallery_id'=> 'required|numeric|min:1',
            'display_order'=> 'required|numeric|min:0',
            'image_upload' => 'image',
        ],
        [
            'gallery_id' => 'Không lấy được thông tin gallery.',
            'image_upload.image' => 'File phải ở định dạng ảnh (jpeg, png, bmp, gif, or svg)'
        ]);

        if ($validator->fails()){
            return response()->json([
                'message' => 'Bạn cần nhập đầy đủ thông tin',
                'status' => 'error',
            ]);
        }
         
        if (request()->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('images');                            
            $fitImage = Image::make(Storage::get($path))->fit(810, 510)->encode();
            Storage::put($path, $fitImage);            


            $gallery = Gallery::find($request->gallery_id);
            $images =  new Media();
            $images->name =  $request->name_image;
            $images->description =$request->description_image;
            $images->source = $path;
            $images->thumb = $path; ///TODO: Make a thumb here
            $images->type = 1; // is image 
            $images->save();

            $gallery->medias()->attach($images->id, ['order'=> $request->display_order]);
            
            return response()->json([
                'message' => 'Uploaded',
                'status' => 'success',
                'path' => $path,
                'id' => $images->id,
                'name' => $images->name??'---',
                'description' => $images->description??'---',
                'order' => $request->display_order
            ]);
        }

        return response()->json([
            'message' =>  'Không tìm thấy file.',
            'status' => 'error',
        ]);
                    
    }

    public function destroyImage($id)
    {
        DB::beginTransaction();
         try{
            $media = Media::find($id);
            Storage::delete( $media->source, $media->thumb);
            $media->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' =>  'Không thể Xóa!',
                'status' => 'error',
            ]);
        }

        return response()->json([
            'message' =>  'Xóa thành công!',
            'status' => 'success',
        ]);
    }
   
    public function GenerateSlug($name)
    {
        $slug = str_slug($name, "-");
        if(Gallery::where('slug',$slug)->count() >0 )
        {
            $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
        }
        return response()->json([
            'slug' =>  $slug,
            'status' => 'success'
        ]);
    }
}
