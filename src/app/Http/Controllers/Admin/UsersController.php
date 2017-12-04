<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use DB;
use Hash;
class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(21);
        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 21);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'string|nullable',
            'password' => 'required|same:confirm_password',
            // 'roles' => 'required'
        ]);
        
        $input =  $request->except(['confirm_password','roles']);

        $input['password'] = Hash::make($input['password']);
        $input['activated'] = $request->input('activated');

        $user = User::create($input);

        if(!empty($request->input('roles')))
        {
            foreach ($request->input('roles') as $key => $value) 
            {
                $user->attachRole($value);
            }
        }

        return redirect()->route('admin.users.index')
                        ->with('message', 'Sản phẩm đã được cập nhật.')
                        ->with('status', 'success');                  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user->hasRole('admin') && $id != Auth::id())
        {
            if(!Auth::user()->hasRole('admin'))
                return abort(404);
        }

        $roles = Role::where('name','!=','admin')->orWhereNull('name')->pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('admin.users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'string|nullable',
            'password' => 'same:confirm_password',
            // 'roles' => 'required'
        ]);

        $input =  $request->except(['confirm_password','roles']);
      
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        

        $user = User::find($id);
        $user->update($input);

     
        
        DB::table('role_user')->where('user_id',$id)->delete();

        if(!empty($request->input('roles')))
        {
           foreach ($request->input('roles') as $key => $value) 
           {
                $user->attachRole($value);
           }
        }
        

        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->hasRole('admin'))
        {
            return abort(404);
        }
        
        $user ->delete();
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
}
