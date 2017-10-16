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
        // $shopCategory = Category::where('slug', 'products')->firstOrFail();
        // $categories = Category::where('parent_id', $shopCategory->id)->get();
        // $language_list = Language::all();         
        // return View('admin.products.create', compact('categories','language_list'));
        $languages = Language::all(); ///TODO: make condition active
        return View('admin/products/create',compact('languages'));
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
            'slug' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('danger_message', 'ERROR-INPUT: Code EI1002')
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
    
        // $language_list = Language::all();
        // foreach ($language_list as $language){ 
        //     $product_translation = new ProductTranslation;
        //     $product_translation->product_id = $product->id;
        //     $product_translation->language_id = $language->id;
        //     if (!empty( $request->input($language->id.'-name'))) {
        //         $product_translation->name = $request->input($language->id.'-name');  
        //     }
        //     if (!empty( $request->input($language->id.'-summary'))) {
        //         $product_translation->summary = $request->input($language->id.'-summary');  
        //     } 
        //     if (!empty( $request->input($language->id.'-specs'))) {
        //         $product_translation->specs = $request->input($language->id.'-specs');  
        //     } 
        //     if (!empty( $request->input($language->id.'-description'))) {
        //         $product_translation->description = $request->input($language->id.'-description');  
        //     }                                                                                
        //     $product_translation->save();
        // }         
        
        // return redirect('admin/products/edit')
        // ->with('success_message', 'Sản phẩm mới đã được tạo');

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
        // $shopCategory = Category::where('slug', 'products')->firstOrFail();
        // $categories = Category::where('parent_id', $shopCategory->id)->get();
        // $product = Product::where('id', $id)->firstOrFail();
        // $language_list = Language::all();
        // $product_translations = $product->translations()->get();        
        // return View('admin.products.edit', compact('product','product_translations','language_list', 'categories'));

        $product = Product::find($id);
        $languages = Language::all(); ///TODO: make condition active
        return View('admin/products/edit',compact('product','languages'));
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


        // $language_list = Language::all();
        // foreach ($language_list as $language){
        //     $product_tran_id=$request->input($language->id.'-id');
        //     $product_translation = ProductTranslation::find($product_tran_id);
        //     if ($product_translation == null) {
        //         $product_translation = new ProductTranslation;
        //         $product_translation->product_id = $product->id;                
        //         $product_translation->language_id = $language->id;                
        //     }
        //     if (!empty( $request->input($language->id.'-name'))) {
        //         $product_translation->name = $request->input($language->id.'-name');  
        //     }
        //     if (!empty( $request->input($language->id.'-summary'))) {
        //         $product_translation->summary = $request->input($language->id.'-summary');  
        //     } 
        //     if (!empty( $request->input($language->id.'-specs'))) {
        //         $product_translation->specs = $request->input($language->id.'-specs');  
        //     } 
        //     if (!empty( $request->input($language->id.'-description'))) {
        //         $product_translation->description = $request->input($language->id.'-description');  
        //     }                                                                                
        //     $product_translation->save();
        // }


        return redirect()->back()
        ->with('message', 'Sản phẩm đã được cập nhật.')
        ->with('status', 'success')
        ->withInput();
    }
    
    public function upload(){
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move('uploads/images', $file->getClientOriginalName());

            return response()->json([
                'message' => 'Đã upload ảnh của sản phẩm',
                'status' => 'success',
                'src' => 'uploads/images/' . $file->getClientOriginalName()
            ]);
        }

        return response()->json([
            'message' => 'ERROR: EU1001',
            'status' => 'danger',
            'src' => ''
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
        $query = DB::table('products')
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
        $categories = Category::all();
        
        return View('admin.products.index', compact('products','categories'))
      ->with('i', ($request->input('page', 1) - 1) * 21);
    }
}
