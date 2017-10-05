<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\BlogCat;
use App\Models\Blog;
use App\Models\Seo;
use App\Models\Navigator;
use DB;

class BlogController extends Controller
{
    public function blogCatList(){
        $blogCats = BlogCat::where("parent_id",0)->orderBy('sort_order', 'asc')->get();
        return view('admin.blogs.blog_cat_list')->with(["blogCats" => $blogCats]);
    }
    public function addBlogCat(){
        $blogCats = BlogCat::all();
        return view('admin.blogs.add_blog_cat')->with(["blogCats" => $blogCats]);
    } 
    public function insertBlogCat(Request $request){
        $this->validate($request,['name' => 'required',
                                  'slug' => 'required|unique:seo,slug',
                                  'seo_title' => 'required'
                                ]);
        $max_id = $this->get_max_id('blog_cat');
        $system_id = 'BCAT'.$max_id;
        $icon = '' ;
        $icon_file = $request->file('icon');
        if($icon_file != NULL){
            $path = './public/assets/img/blog_cat/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }   
            $icon = $this->upload_file($request->name, $icon_file, $path);
        }

        // Insert data vào bảng blog_cat
        $blogCat = new BlogCat;
        $blogCat->system_id = $system_id;
        $blogCat->name = $request->name;
        $blogCat->en_name = $request->en_name; 
        $blogCat->parent_id = $request->parent_id;
        $blogCat->icon = $icon;
        $blogCat->sort_order = $request->sort_order;
        $blogCat->is_show = $request->is_show;
        $blogCat->is_show_nav = $request->is_show_nav;
        $blogCat->save();

        // Insert data vào bảng seo
        $seo = new Seo;
        $seo->system_id = $system_id;
        $seo->name = $request->name;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->type = "BCAT";
        $seo->save();

        // Insert data vào bảng navigator (menu)
        if($request->is_show_nav==1){
            $navigator = new Navigator;
            $navigator->system_id = $system_id;
            $navigator->name = $request->name;
            $navigator->en_name = $request->en_name;
            $navigator->type = 2;   // Menu được tạo gián tiếp (qua danh mục sản phẩm hoặc danh mục bài viết ) : type = 2
            $navigator->save();
        }

        session()->flash('success_message', "Thêm danh mục thành công !");
        return redirect()->route('admin.blog-cat');
    }  
    public function editBlogCat($cat_id)
    {
        $blogCatList = BlogCat::where('parent_id',0)->orderBy('sort_order', 'asc')->get();
        $blogCatDetail = BlogCat::find($cat_id);
        $blogCatSeo = Seo::where('system_id',$blogCatDetail->system_id)->first();
        return view('admin.blogs.edit_blog_cat')->with(["blogCatList" => $blogCatList, 
                                                        "blogCatDetail" => $blogCatDetail, 
                                                        "blogCatSeo" => $blogCatSeo]); 
    }
    public function updateBlogCat($cat_id, Request $request)
    {
        $blogCat = BlogCat::find($cat_id);
        $this->validate($request,['name' => 'required',
                                  'slug' => [
                                                'required',
                                                Rule::unique('seo','slug')->ignore($blogCat->system_id,'system_id'),
                                            ],
                                  'seo_title' => 'required'
                                ]);
        $icon = '' ;
        $icon_file = $request->file('icon');
        if($icon_file != NULL){
            $path = './public/assets/img/blog_cat/';
            if(!is_dir($path)){
                mkdir($path, 0777, true);
            }   
            $icon = $this->upload_file($request->name, $icon_file, $path);
        }

        // Update data bảng seo
        $seo = Seo::where('system_id',$blogCat->system_id)->first();
        $seo->name = $request->name;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->save();

        if($blogCat->is_show_nav != $request->is_show_nav){
            if($request->is_show_nav==1){  // Insert data vào bảng navigator (menu)
                $navigator = new Navigator;
                $navigator->system_id = $blogCat->system_id;
                $navigator->name = $request->name;
                $navigator->en_name = $request->en_name;
                $navigator->type = 'BCAT';  
                $navigator->save();
            }
            else{  // Xóa menu
                $navigator = Navigator::where('system_id',$blogCat->system_id)->first();
                $navigator->delete();
            }
        }

         // Update data bảng blog_cat
        $blogCat->name = $request->name;
        $blogCat->en_name = $request->en_name;
        $blogCat->parent_id = $request->parent_id;
        $blogCat->icon = $icon;
        $blogCat->sort_order = $request->sort_order;
        $blogCat->is_show = $request->is_show;
        $blogCat->is_show_nav = $request->is_show_nav;
        $blogCat->save();

        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.blog-cat'); 
    }
    public function deleteBlogCat($cat_id){
        $blogCat = BlogCat::find($cat_id);
        if($blogCat->icon != ''){
            $icon_file = './public/assets/img/blog_cat/'.$blogCat->icon;
            if(file_exists($icon_file))
                unlink($icon_file);
        }
        if($blogCat->is_show_nav==1){
            $navigator = Navigator::where('system_id',$blogCat->system_id)->first();
            $navigator->delete();
        }
        $seo = Seo::where('system_id',$blogCat->system_id)->first();
        $seo->delete();
        $blogCat->delete();

        session()->flash('success_message', "Xóa danh mục thành công !");
        return redirect()->route('admin.blog-cat'); 
    }
    public function blogList(Request $request){
        $blogs = Blog::orderBy('last_update', 'desc')->get();
        $blogCats = BlogCat::where('parent_id',0)->orderBy('sort_order', 'asc')->get();
        $title = $request->input('title'); 
        $cat_id = $request->input('cat_id');
        return view('admin.blogs.blog_list',compact('blogs','title','cat_id','blogCats'))
               ->with('i', ($request->input('page', 1) - 1) * 10);
        //return view('admin.blogs.blog_list')->with(["blogs" => $blogs, "blogCats" => $blogCats]);
    }
    public function addBlog(){
        $blogCats = BlogCat::all();
        return view('admin.blogs.add_blog')->with(["blogCats" => $blogCats]);
    } 
    public function insertBlog(Request $request){
        $this->validate($request,['title' => 'required',
                                  'slug' => 'required|unique:seo,slug',
                                  'seo_title' => 'required',
                                  // còn thiếu cat_id, thumb, promote_end
                                ]);
        $max_id = $this->get_max_id('blogs');
        $system_id = 'BLG'.$max_id;
        $thumb = '' ;
        $thumb_file = $request->file('thumb');
        if($thumb_file != NULL){
            $path = './public/assets/img/blog';
            $img = Image::make($thumb_file->getRealPath());
            $img->fit(370, 200)->save($path.'/'.$thumb_file->getClientOriginalName());            
            $thumb = $thumb_file->getClientOriginalName();
        }

        // Insert data vào bảng blog
        $blog = new Blog;
        $blog->system_id = $system_id;
        $blog->title = $request->title;
        $blog->en_title = $request->en_title;
        $blog->cat_id = $request->cat_id;
        $blog->is_show = $request->is_show;
        $blog->thumb = $thumb;
        $blog->introduce = $request->introduce;
        $blog->en_introduce = $request->en_introduce;
        $blog->content = $request->content;
        $blog->en_content = $request->en_content;
        $blog->create_time = date("Y-m-d H:i:s",time());
        $blog->save();

        // Insert data vào bảng seo
        $seo = new Seo;
        $seo->system_id = $system_id;
        $seo->name = $request->title;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->type = "BLOG";  
        $seo->save();

        session()->flash('success_message', "Thêm blog thành công !");
        return redirect()->route('admin.blog');
    }  
    public function editBlog($blog_id)
    {
        $blogCats = BlogCat::all();
        $blogDetail = Blog::find($blog_id);
        $blogSeo = Seo::where('system_id',$blogDetail->system_id)->first();
        return view('admin.blogs.edit_blog')->with(["blogCats" => $blogCats, 
                                                          "blogDetail" => $blogDetail, 
                                                          "blogSeo" => $blogSeo]); 
    }
    public function updateBlog($blog_id, Request $request)
    {
        $blog = Blog::find($blog_id);
        $this->validate($request,['title' => 'required',
                                  'slug' => [
                                                'required',
                                                Rule::unique('seo','slug')->ignore($blog->system_id,'system_id'),
                                            ],
                                  'seo_title' => 'required'
                                  // còn thiếu cat_id, thumb, promote_end
                                ]);
        $thumb = '' ;
        $thumb_file = $request->file('thumb');
        if($thumb_file != NULL){
            $path = './public/assets/img/blog';
            $img = Image::make($thumb_file->getRealPath());
            $img->fit(370, 200)->save($path.'/'.$thumb_file->getClientOriginalName());            
            $thumb = $thumb_file->getClientOriginalName();
        }

        // Update data bảng seo
        $seo = Seo::where('system_id',$blog->system_id)->first();
        $seo->name = $request->title;
        $seo->slug = $request->slug;
        $seo->seo_title = $request->seo_title;
        $seo->en_seo_title = $request->en_seo_title;
        $seo->keyword = $request->keyword;
        $seo->description = $request->description;
        $seo->save();

        // Update data bảng blog
        $blog->title = $request->title;
        $blog->en_title = $request->en_title;
        $blog->cat_id = $request->cat_id;
        $blog->is_show = $request->is_show;
        $blog->thumb =$thumb;
        $blog->introduce = $request->introduce;
        $blog->en_introduce = $request->en_introduce;
        $blog->content = $request->content;
        $blog->en_content = $request->en_content;
        $blog->save();

        session()->flash('success_message', "Cập nhật thành công !");
        return redirect()->route('admin.blog'); 
    }
    public function deleteBlog($blog_id){
        $blog = Blog::find($blog_id);
        if($blog->thumb != ''){
            $thumb_file = './public/assets/img/blog/'.$blog->thumb;
            if(file_exists($thumb_file))
                unlink($thumb_file);
        }
        $seo = Seo::where('system_id',$blog->system_id)->first();
        $seo->delete();
        $blog->delete();

        session()->flash('success_message', "Xóa blog thành công !");
        return redirect()->route('admin.blog'); 
    }

    // Tìm kiếm blog
    public function searchBlog(Request $request){
        $title = $request->input('title'); 
        $cat_id = $request->input('cat_id');
        
        if($title != ''){
            $blogs = Blog::where("title", "LIKE", "%$title%")->paginate(10);   
        }
        elseif($cat_id != 0){
            //$blogs = Blog::where("cat_id", $cat_id)->paginate(10); 
            $blogs = $this->get_all_blog($cat_id);
        }
        else{
             $blogs = Blog::orderBy('last_update','DESC')->paginate(10);
        }
        $blogCats = BlogCat::where('parent_id',0)->orderBy('sort_order', 'asc')->get();
        return view('admin.blogs.blog_list',compact('blogs','title','cat_id','blogCats'))
               ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // Lấy tất cả bà viết trong danh mục và danh mục con
    public function get_all_blog($cat_id, $blogList = null){  
        if($blogList === null) {
            $blogList = collect();   
        }
        $blogs = Blog::where('cat_id',$cat_id)->get(); 
        $blogList = $blogList->merge($blogs);
        $blogCat = BlogCat::find($cat_id);
        if(BlogCat::hasChildCat($cat_id)){
            foreach (BlogCat::getChildCat($cat_id) as $childCat) {
                $blogList = self::get_all_blog($childCat->id, $blogList);
            }
        }

        return $blogList;
    }

    //Lấy id lớn nhất trong table
    function get_max_id($table){
        $max_id = DB::table($table)->max('id');
        if($max_id != NULL)
            return $max_id + 1;
        else
            return 1;
    }

    // Upload 1 file
    function upload_file($object_name, $file, $path){
        $ext = $file->getClientOriginalExtension();
        $org_name = url_format($object_name);   // Định dạng lại phần tên gốc (remove utf8)
        $file_name = $org_name.".".$ext;
        $i=0;
        $check_file = file_exists($path.$file_name); // Kiểm tra file đã tồn tại trong thư mục hay chưa
        while ($check_file){  // Nếu đã tồn tại thì thêm số đếm vào sau tên file
            $i++;
            $tmp_org_name = $org_name.'-'.$i;
            $file_name = $tmp_org_name.".".$ext;
            $check_file = file_exists($path.$file_name);
        }
      
        if($file->move($path,$file_name))
            return $file_name;
        else
            return '';
    }
}
