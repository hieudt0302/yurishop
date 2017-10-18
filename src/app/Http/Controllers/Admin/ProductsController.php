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
use Validator;
use Intervention\Image\Facades\Image;
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
        return View('admin/products/create',compact('languages','categories'));
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

        $product->save();  

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
        $shopCategory = Category::where('slug', 'products')->firstOrFail();
        
        $categories = Category::where('parent_id', $shopCategory->id)->get();
        $product = Product::find($id);
		if(empty($product))
		{
			return redirect()->back()
            ->with('message', 'Không tìm thấy sản phẩm này!')
            ->with('status', 'danger');
		}
        $languages = Language::all(); ///TODO: make condition active
        return View('admin/products/edit',compact('product','languages','categories'));
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
            ->with('message', 'ERROR-INPUT: Code EI1002')
            ->with('status', 'danger')
            ->withInput();
        }

        $product = Product::find($id);
        
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
                'message' => 'ERROR-INPUT: Code EI1001',
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
            'image_upload.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
        ]);

        if ($validator->fails()){
            return response()->json([
                'message' => 'Bạn cần nhập đầy đủ thông tin',
                'status' => 'error',
            ]);
        }
         
        if (request()->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('images');
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
        session()->flash('success_message', "Xóa thành công!");        
        return redirect()->route('admin.products.index'); 
    }

    public function categories(Request $request)
    {
        $categories = Category::all();
        return View('admin/products/categories',compact('categories'));
    }

    public function reviews(Request $request)
    {
        $reviews = Comment::where('commentable_type','App\Models\Product')->get();
        return View('admin/products/reviews',compact('reviews'));
    }

    public function filter(Request $request)
    {
        $query = DB::table('products')->whereNull('deleted_at')
             ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
             ->leftJoin('medias', 'product_media.media_id', '=', 'medias.id')
             ->select('products.id','products.name', 'products.sku', 'products.published', 'products.created_at', 'medias.source')
             ->groupBy('products.id');
        
        if (strlen($request->from_date) > 0) {
            $startDate = date('Y-m-d'.' 00:00:00', strtotime($request->from_date));
            $query->where('products.created_at', '>=', $startDate);
        }
        if (strlen($request->to_date) > 0) {
            $endDate = date('Y-m-d'.' 23:59:59', strtotime($request->to_date));
            $query->where('products.created_at', '<=', $endDate);
        }

        $product_name = $request->product_name;
        if (strlen($product_name) > 0) {
            $query->where(function ($subQuery) use ($product_name) {
                $subQuery->where('products.name', 'LIKE', '%'.strtolower($product_name).'%');
                ///TODO: find in translation table
                // $subQuery->orWhere(DB::raw('SELECT name FROM product_translation'), 'LIKE', '%'.$product_name.'%');
            });
        }

        if (strlen($request->sku) > 0) {
            $query->where('products.sku','LIKE', '%'.$request->sku. '%');
        }

        if (is_numeric($request->category_id) && (int)$request->category_id > 0) {
            $query->whereIn('category_id', $request->category_id);
        }
        ///TODO: Get sub category. Not yet!

        $products = $query->paginate(21);
        $shopCategory = Category::where('slug', 'products')->firstOrFail();
        $categories = Category::where('parent_id', $shopCategory->id)->get();
        
        return View('admin.products.index', compact('products','categories'))
      ->with('i', ($request->input('page', 1) - 1) * 21);
    }
}
