<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Cart;





class CartController extends Controller
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

    public function Index(Request $request){

        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;

        $add=Cart::add($data);
        
          if ($add) {
             $notification=array(
             'messege'=>'Successfully added into Cart ',
             'alert-type'=>'success'
              );
            return Redirect()->back()->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }    
       
    }


    public function Update(Request $request, $rowId){
        $qty=$request->qty;
        $upd=Cart::update($rowId, $request->qty);

        if ($upd) {
            $notification=array(
            'messege'=>'Successfully Updated',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }    

    }

    public function Delete($rowId){
        $dlt=Cart::remove($rowId);

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully Updated',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'Item Deleted',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }    

    }

    public function Invoice(Request $request){   
            $cus_id=$request->cus_id;
            $customer=DB::table('customers')->where('id',$cus_id)->first();
            $contents=Cart::content();
            return view('cart.invoice', compact('customer','contents'));
    }


    public function FinalInvoice(Request $request){
        $data=array();
        $data['cusId']=$request->cusId;
        $data['orderDate']=$request->orderDate;
        $data['orderStatus']=$request->orderStatus;
        $data['totalProd']=$request->totalProd;
        $data['subTotal']=$request->subTotal;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payStatus']=$request->payStatus;
        $data['pay']=$request->pay;
        $data['due']=$request->due;

        $order_id=DB::table('orderdetails')->insertGetId($data);
        $contents=Cart::content();


        $odata=array();
        foreach($contents as $content){
        $odata['orderId']=$order_id;
        $odata['productId']=$content->id;
        $odata['unitCost']=$content->price;
        $odata['qty']=$content->qty;
        $odata['total']=$content->total;

        $insert=DB::table('orders')->insert($odata);
        }

        
        


        if ($insert) {
            $notification=array(
            'messege'=>'Successfully Invoice Created',
            'alert-type'=>'success'
             );
             Cart::destroy();
           return Redirect()->route('pending.order')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
          
       
    }

}
