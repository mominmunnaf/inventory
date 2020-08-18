<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){
        $product=DB::table('products')
                ->join('categories','products.catId','categories.id')
                ->select('categories.catName','products.*')
                ->get();
        $customer=DB::table('customers')->get();
        $category=DB::table('categories')->get();
        return view('pos.pos', compact('product','customer','category'));
    }

    public function PendingOrder(){
        $pending=DB::table('orderdetails')
                ->join('customers','orderdetails.cusId','customers.id')
                ->select('customers.name','orderdetails.*')
                ->where('orderStatus','pending')
                ->get();

        return view('cart.pending_order',compact('pending'));
    }


    public function ViewOrder($id){
        $order=DB::table('orderdetails')
                ->join('customers','customers.id','orderdetails.cusId')
               ->join('orders','orderdetails.id','orders.orderId')
               ->select('orderdetails.*','orders.orderId','customers.*',)
                ->where('orderdetails.id',$id)
                ->first();
        
                $order_details=DB::table('orders')
                            ->join('products','orders.productId','products.id')
                            ->select('orders.*','products.name','products.code')
                            ->where('orderId',$id)
                            ->get();
                
        return view('cart.order_confirmation',compact('order','order_details'));

        // echo "<pre>";
        // print_r($order);
        // echo "<br>";
        // print_r($order_details);
        
    }


    public function PosDone($id){
        $approve=DB::table('orderdetails')->where('id',$id)->update(['orderStatus'=>'approved']);
       
    
        if ($approve) {
            $notification=array(
            'messege'=>'Pending oreder delivered',
            'alert-type'=>'success'
             );
             
           return Redirect()->route('pending.order')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 

    }


    public function SuccessOrder(){
        $success=DB::table('orderdetails')
                ->join('customers','orderdetails.cusId','customers.id')
                ->select('customers.name','orderdetails.*')
                ->where('orderStatus','approved')
                ->get();

        return view('cart.success_order',compact('success'));
    }




}
