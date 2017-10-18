<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Category::where('is_menu_avaiable',1)
            ->whereNull('parent_id')
            ->get();

        return View('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Category::where('is_menu_avaiable',1)
        ->whereNull('parent_id')
        ->get();
        return View('admin.menu.create', compact('menus'));
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
            'slug' => 'required|string|min:5|unique:categories',
            'order' => 'numeric|min:0'
        ],
        [
            'name.required' => 'Không được để trống tên menu.',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
            'order.numeric' => 'Giá trị nhập [Vị Trí Sắp Xếp] phải là chữ số nguyên, không âm.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $menu = new Category();
        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->enabled = $request->enabled??0;
        $menu->is_visible = $request->is_visible??0;
        $menu->is_menu_avaiable = true;

     
        if (is_numeric($request->parent) && (int)$request->parent >0 ) {
            $menu->parent_id = $request->parent_id;
        }
        $menu->save();
        return redirect()->action(
            'Admin\MenuController@edit', ['id' => $menu->id]
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Category::find($id);
        return View('admin/menu/edit', compact('menu'));
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
            'slug' => 'required|string|min:5',
            'order' => 'numeric|min:0'
        ],
        [
            'name.required' => 'Không được để trống tên menu.',
            'slug.required' => 'Không được để trống hoặc có khoảng trắng trong chuỗi slug.',
            'slug.min' => 'Độ dài tối thiểu của slug là 5.',
            'order.numeric' => 'Giá trị nhập [Vị Trí Sắp Xếp] phải là chữ số nguyên, không âm.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $menu =Category::find($id);
        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->enabled = $request->enabled??0;
        $menu->is_visible = $request->is_visible??0;
        $menu->is_menu_avaiable = true;

     
        if (is_numeric($request->parent) && (int)$request->parent >0 ) {
            $menu->parent_id = $request->parent_id;
        }
        $menu->save();

        return redirect()->back()
        ->with('message', 'Menu đã được cập nhật.')
        ->with('status', 'success')
        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Category::find($id);
        $menu->delete();
        session()->flash('success_message', "Xóa menu thành công!");        
        return redirect()->route('admin.menu.index'); 
    }
}
