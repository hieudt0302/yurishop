<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Language;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Tag;
use Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->filter($request);
    }


    public function find(Request $request)
    {
        return $this->filter($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all(); ///TODO: make condition active
        $shopCategory = Category::where('slug', 'products')->firstOrFail();
        $categories = Category::where('parent_id', $shopCategory->id)->get();      
        $tags = Tag::all();
        
        return View('admin/products/create',compact('languages','categories', 'tags'));
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
            'slug' => 'required|string|min:5|unique:products',
            'old_price' => 'numeric|min:0',
            'price' => 'numeric|min:0',
            'special_price' => 'numeric|min:0'
        ],
        [
            'name.required' => 'Không được để trống tên sản phẩm.',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
            'old_price.numeric' => 'Giá trị nhập của [Giá Tiền Cũ]  phải là chữ số, không âm.',
            'price.numeric' => 'Giá trị nhập của [Giá Tiền]  phải là chữ số, không âm.',
            'special_price.numeric' => 'Giá trị nhập của [Giá Tiền Đặc Biệt]  phải là chữ số, không âm.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $product = new Product();

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->published = $request->published??0;
        if (!empty($request->sku)) {
            $product->sku = $request->sku;
        }

        $product->disable_buy_button = $request->disable_buy_button??0;
        $product->disable_wishlist_button = $request->disable_wishlist_button??0;
        $product->call_for_price = $request->call_for_price??0;
        $product->sold_off = $request->sold_off??0;

        
        
       
        if (!empty($request->old_price)) {
            $product->old_price = $request->old_price;
        }
    
        if (!empty($request->price)) {
            $product->price = $request->price;
        }
    
        if (!empty($request->special_price)) {
            $product->special_price = $request->special_price;
        }
    
        if (!empty($request->special_price_start_date)) {
            $product->special_price_start_date = $request->special_price_start_date;
        }
    
        if (!empty($request->special_price_end_date)) {
            $product->special_price_end_date = $request->special_price_end_date;
        }
    
        if (!empty($request->minimum_amount)) {
            $product->minimum_amount = $request->minimum_amount;
        }
                
        if (!empty($request->maximum_amount)) {
            $product->maximum_amount = $request->maximum_amount;
        }
                
        if (!empty($request->category_id)) {
            $product->category_id = $request->category_id;
        }        

        $product->author_id = Auth::user()->id;

        $product->save();  //Get taggable_id first. It is product_id

        /* Make new tags */
        $this->SelectTags($product, $request->tagIds);
        
        return redirect()->action(
            'Admin\ProductsController@edit', ['id' => $product->id]
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        
        if(empty($product))
        {
            return redirect()->route('admin.products.index')
            ->with('message', 'Sản phẩm không tồn tại trên hệ thống')
            ->with('status', 'danger');
        }

        $shopCategory = Category::where('slug', 'products')->firstOrFail();
        
        $categories = Category::where('parent_id', $shopCategory->id)->get();
		if(empty($product))
		{
			return redirect()->back()
            ->with('message', 'Sản phẩm không được tìm thấy!')
            ->with('status', 'danger');
        }
        $tags = Tag::all();
        $languages = Language::all(); ///TODO: make condition active
        $tab = 1;
        return View('admin/products/edit',compact('product','languages','categories','tags','tab'));
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
            'slug' => 'required|string|min:1',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $product = Product::find($id);
        //
        $product->name = $request->name;
        $product->slug = $request->slug;

        if (!empty($request->sku)) {
            $product->sku = $request->sku;
        }
        if (!empty($request->old_price)) {
            $product->old_price = $request->old_price;
        }

        if (!empty($request->price)) {
            $product->price = $request->price;
        }

        if (!empty($request->special_price)) {
            $product->special_price = $request->special_price;
        }

        if (!empty($request->special_price_start_date)) {
            $product->special_price_start_date = $request->special_price_start_date . ' 00:00:00' ;
        }

        if (!empty($request->special_price_end_date)) {
            $product->special_price_end_date = $request->special_price_end_date. ' 23:59:59' ;
        }

            //
        if (!empty($request->minimum_amount)) {
            $product->minimum_amount = $request->minimum_amount;
        }
            
                //
        if (!empty($request->special_price)) {
            $product->maximum_amount = $request->maximum_amount;
        }
            

        if (!empty($request->category_id)) {
            $product->category_id = $request->category_id;
        }

        $product->author_id = Auth::user()->id;

        $product->disable_buy_button = $request->disable_buy_button??0;
        $product->disable_wishlist_button = $request->disable_wishlist_button??0;
        $product->call_for_price = $request->call_for_price??0;
        $product->sold_off = $request->sold_off??0;
        $product->published = $request->published??0;

        $product->save();

        /* Make new tags */
        $this->SelectTags($product, $request->tagIds);


        return redirect()->back()
        ->with('message', 'Sản phẩm đã được cập nhật.')
        ->with('status', 'success')
        ->withInput();
    }
    
    public function updateTranslation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'language_id' =>'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Không được để trống tên sản phẩm',
                'status' => 'error'
            ]);
        }

        $translation = ProductTranslation::where('language_id',$request->language_id)
        ->where('product_id',$id)->withoutGlobalScopes()
        ->first();

        if(!empty($translation))
        {
            $translation->name = $request->name;
            $translation->summary = $request->summary;
            $translation->description = $request->description;
            $translation->specs = $request->specs;
            $translation->save();
        }else{
            $translation = new  ProductTranslation();
            $translation ->name = $request->name;
            $translation ->summary = $request->summary;
            $translation ->description = $request->description;
            $translation ->specs = $request->specs;
            $translation->product_id = $id;
            $translation->language_id =  $request->language_id;
            $translation->save();
        }

        return response()->json([
            'message' => 'Cập nhật nội dung  thành công.',
            'status' => 'success',
            'type' => 'update'
        ]);
    }

    public function fetchTranslation($id, $code)
    {
        $translation = ProductTranslation::where('language_id',$code)
        ->where('product_id',$id)->withoutGlobalScopes()
        ->first();

        $id = 0;
        $name = "";
        $summary = "";
        $description = "";
        $specs = "";

        if(!empty($translation))
        {
            $id =  $translation->id;
            $name =  $translation ->name;
            $summary =  $translation ->summary;
            $description =  $translation ->description;
            $specs =  $translation ->specs;
        }
        return response()->json([
            'message' => 'OK',
            'id' => $id,
            'name'=> $name,
            'summary' =>$summary,
            'description' =>$description,
            'specs' => $specs
        ]);
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'product_id'=> 'required|numeric|min:1',
            'display_order'=> 'required|numeric|min:0',
            'image_upload' => 'image',
        ],
        [
            'product_id' => 'Không lấy được thông tin sản phẩm. CodeI1002x1',
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
            $fitImage = Image::make(Storage::get($path))->fit(420, 420)->encode();
            Storage::put($path, $fitImage); 


            $product = Product::find($request->product_id);
            $images =  new Media();
            $images->name =  $request->name_image;
            $images->description =$request->description_image;
            $images->source = $path;
            $images->thumb = $path; ///TODO: Make a thumb here
            $images->type = 1; // is image 
            $images->save();

            $product->medias()->attach($images->id, ['order'=> $request->display_order]);
            
            return response()->json([
                'message' => 'Uploaded',
                'status' => 'success',
                'path' => $path,
                'id' => $images->id,
                'name' => $images->name,
                'description' => $images->description,
                'order' => $request->display_order
            ]);
        }

        return response()->json([
            'message' =>  'Không tìm thấy file.',
            'status' => 'error',
        ]);
                    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')
        ->with('message', 'Xóa một sản phẩm thành công!')
        ->with('status', 'success');
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
    public function categories(Request $request)
    {
        $categories = Category::all();
        return View('admin/products/categories',compact('categories'));
    }

   

    public function filter(Request $request)
    {
        $product_name = $request->product_name;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $sku= $request->sku;
        $category_id = $request->category_id;

        $query = Product::leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
             ->leftJoin('medias', 'product_media.media_id', '=', 'medias.id')
             ->select('products.id','products.name', 'products.sku', 'products.published', 'products.created_at', 'medias.source')
             ->groupBy('products.id')
             ->where(function ($query) use ($product_name) {
                if (strlen($product_name) > 0) 
                    $query->where('products.name', 'LIKE', '%'.strtolower($product_name).'%');
            })
            ->where(function ($query) use ($from_date) {
                if (strlen($from_date) > 0) 
                {
                    $startDate = date('Y-m-d'.' 00:00:00', strtotime($from_date));
                    $query->where('products.created_at', '>=', $startDate);
                }
            })
            ->where(function ($query) use ($to_date) {
                if (strlen($to_date) > 0) 
                {
                    $endDate = date('Y-m-d'.' 23:59:59', strtotime($to_date));
                    $query->where('products.created_at', '<=', $endDate);
                }
            })
            ->where(function ($query) use ($sku) {
                if (strlen($sku) > 0) 
                    $query->where('products.sku','LIKE', '%'.$sku. '%');
            })
            ->where(function ($query) use ($category_id) {
                if (is_numeric($category_id) > 0 && (int)$category_id > 0) 
                    $query->whereIn('category_id', [$category_id]);
            });
   

        $products = $query->paginate(21);
        $shopCategory = Category::where('slug', 'products')->firstOrFail();
        $categories = Category::where('parent_id', $shopCategory->id)->get();
        
        $request->flashOnly(['from_date', 'to_date', 'product_name', 'sku', 'category_id']);
       
        return View('admin.products.index', compact('products','categories'))
        ->with('i', ($request->input('page', 1) - 1) * 21);
    }

    public function GenerateSlug($name)
    {
        $slug = str_slug($name, "-");
        if(Product::where('slug',$slug)->count() >0 )
        {
            $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
        }
        return response()->json([
            'slug' =>  $slug,
            'status' => 'success'
        ]);
    }

    public function SelectTags($product, $tagIds)
    {
        if(is_array($tagIds)){
            foreach($tagIds as $key =>  $id)
            {
                if(empty(Tag::find($id)))
                {
                    $tag = new Tag();
                    $tag->name = $id;
                    $slug = str_slug($id, "-");
                    
                    if(Tag::where('slug',$slug)->count() >0 )
                    {
                        $slug = $slug . '-' .  date('y') . date('m'). date('d'). date('H'). date('i'). date('s'); 
                    }
                    $tag->slug = $slug;
                    $tag->save();
    
                    $tagIds[$key] = $tag->id;
                } 
            }
            $tags = Tag::whereIn('id',$tagIds)->get();
            $product->tags()->sync($tags); 
        }
    }

    /* REVIEWS */
    public function reviews(Request $request)
    {
        return $this->filterreviews($request);
    }
    public function findreviews(Request $request)
    {
        return $this->filterreviews($request);
    }
    public function filterreviews(Request $request, $content_message=null,$status_message=null )
    {
        $created_from = $request->created_from;
        $created_to = $request->created_to;
        $review = $request->review;
        $approved_type = $request->approved_type??2;
        // $product_name = $request->product_name;

        $reviews =  Comment::where('commentable_type','App\Models\Product')
            ->where('comment','LIKE', '%'. $review . '%')
            ->where(function($query) use ($approved_type){
                if($approved_type==1  || $approved_type==0 )
                    $query->where('approved', $approved_type);
            })
            ->where(function($query) use ($created_from,  $created_to){
                if(strlen($created_from)> 0 && strlen($created_to)> 0)
                    $query->whereBetween('created_at',[$created_from . ' ' . '00:00:00',  $created_to . ' ' . '23:59:59']);
                else if(strlen($created_from)> 0 && strlen($created_to) < 0)
                    $query->where('created_at',$created_from . ' ' . '00:00:00');
                else if(strlen($created_from) < 0 && strlen($created_to) > 0)
                    $query->where('created_at', $created_to . ' ' . '23:59:59');

            })
            ->paginate(21);

   
        return View('admin/products/reviews',compact('reviews'))
        ->with('message',$content_message)
        ->with('status', $status_message)
        ->with('i', ($request->input('page', 1) - 1) * 21);
    }

    public function editreviews($id)
    {
        return redirect()->route('admin.products.reviews');
    }

    public function deletereviews($id)
    {
        $review = Comment::find($id);
        $review->delete();

        return redirect()->route('admin.products.reviews')
        ->with('message', 'Đã xóa đánh giá!')
        ->with('status', 'success');

    }
}
