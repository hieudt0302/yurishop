<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderShop;
use App\Models\OrderDetail;
use DB;

class OrderShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
          $shop = $request->input('shop');  
          $landingcode = $request->input('from');         
          $status = $request->get('status');
          
            echo "<script>console.log( 'Debug Objects 1: " . $shop . "' );</script>";
            echo "<script>console.log( 'Debug Objects 2: " . $landingcode . "' );</script>";
            echo "<script>console.log( 'Debug Objects 3: " . $status . "' );</script>";
 
          if(empty($status) || (int)$status===0)
          {
              $statusIn =[1,2,3,4];
          } 
          else
          {
              $statusIn=[$status];
          }
        
         if(!empty($shop) && !empty($landingcode))
         {
             $ordershops = OrderShop::orderBy('id','DESC')
             ->where('shop', 'like', '%' . $shop . '%')
             ->where('landing_code','=', $landingcode)
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($shop))
         {
              $ordershops = OrderShop::orderBy('id','DESC')
              ->where('shop', 'like', '%' . $shop . '%')
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
         elseif(!empty($landingcode))
         {
             $ordershops = OrderShop::orderBy('id','DESC')
             ->where('landing_code','=', $landingcode)
             ->whereIn('status', $statusIn )
             ->paginate(10);
         }
         else
         {
             $ordershops = OrderShop::orderBy('id','DESC')
             ->whereIn('status', $statusIn)
             ->paginate(10);
         }
 
         return view('admin.ordershops.index',compact('ordershops','shop','landingcode','status'))
         ->with('i', ($request->input('page', 1) - 1) * 10);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ordershops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get ordershop by id
        $ordershop = OrderShop::where('id',$id)->first();

        //get all product of ordershops by id where orderdetails.ordershop_id equal id
        $orderdetails = OrderDetail::where('ordershop_id', $id)->get();

        
        return view('admin.ordershops.show',compact('ordershop','orderdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Find the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function find(Request $request)
     {
        $shop = $request->input('shop');  
        $landingcode = $request->input('from');         
        $status = $request->get('status');
        
          echo "<script>console.log( 'Debug Objects 1: " . $shop . "' );</script>";
          echo "<script>console.log( 'Debug Objects 2: " . $landingcode . "' );</script>";
          echo "<script>console.log( 'Debug Objects 3: " . $status . "' );</script>";

        if(empty($status) || (int)$status===0)
        {
            $statusIn =[1,2,3,4];
        } 
        else
        {
            $statusIn=[$status];
        }
      
       if(!empty($shop) && !empty($landingcode))
       {
           $ordershops = OrderShop::orderBy('id','DESC')
           ->where('shop', 'like', '%' . $shop . '%')
           ->where('landing_code','=', $landingcode)
           ->whereIn('status', $statusIn)
           ->paginate(10);
       }
       elseif(!empty($shop))
       {
            $ordershops = OrderShop::orderBy('id','DESC')
            ->where('shop', 'like', '%' . $shop . '%')
           ->whereIn('status', $statusIn)
           ->paginate(10);
       }
       elseif(!empty($landingcode))
       {
           $ordershops = OrderShop::orderBy('id','DESC')
           ->where('landing_code','=', $landingcode)
           ->whereIn('status', $statusIn )
           ->paginate(10);
       }
       else
       {
           $ordershops = OrderShop::orderBy('id','DESC')
           ->whereIn('status', $statusIn)
           ->paginate(10);
       }

       return view('admin.ordershops.index',compact('ordershops','shop','landingcode','status'))
       ->with('i', ($request->input('page', 1) - 1) * 10);
     }
}
