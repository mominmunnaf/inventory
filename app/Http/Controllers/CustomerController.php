<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class CustomerController extends Controller
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

    //ADD CUSTOMER FUNCTION IS HERE--------------------
    public function AddCustomer(){
        return view('customer.add_customer');
    }

    public function InsertCustomer(Request $request){
        $data=array();
        $data['name']=$request->name;        
        $data['address']=$request->address;
        $data['phone']=$request->phone;      
        $data['bank']=$request->bank;      
        $data['branch']=$request->branch;      
        $data['acNo']=$request->acNo;      
        $data['acName']=$request->acName;          
        $data['shopName']=$request->shopName;      
        
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(7);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
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
                
            }else{

              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }

    //ALL CUSTOMER LIST FUNCTION IS HERE------------------------
    public function AllCustomer(){

        $customer=DB::table('customers')->get();
        return view('customer.all_customer', compact('customer'));
    }


    //VIEW CUSTOMER FUNCTION IS HERE------------------------
    public function ViewCustomer(Request $request, $id){
        $view=DB::table('customers')->where('id',$id)->first();
        return view('customer.view_customer', compact('view'));
    }

    //DELETE CUSTOMER FUNCTION IS HERE------------------------------
    public function DeleteCustomer($id){
        $delete=DB::table('customers')->where('id',$id)->first();
        $photo=$delete->photo;
        unlink($photo);
        
        $dlt=DB::table('customers')->where('id',$id)->delete();
        

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully Customer Deleted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.customer')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }

    //EDIT CUSTOMER FUNCTION IS HERE--------------------------
    public function EditCustomer($id){
        $edt=DB::table('customers')->where('id',$id)->first();
        return view('customer.edit_customer', compact('edt'));
    }

    public function UpdateCustomer(Request $request, $id){
        $data=array();
        $data['name']=$request->name;
        $data['address']=$request->address;
        $data['phone']=$request->phone;      
        $data['bank']=$request->bank;      
        $data['branch']=$request->branch;      
        $data['acNo']=$request->acNo;      
        $data['acName']=$request->acName;          
        $data['shopName']=$request->shopName; 
        $image=$request->photo;

        if ($image) {
        $image_name=str::random(7);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/customer/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('customers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('customers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Customer Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }




    //CLOSING TAG--------------------------------------
}
