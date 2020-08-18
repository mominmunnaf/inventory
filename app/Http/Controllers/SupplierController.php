<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class SupplierController extends Controller
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

    //ADD SUPPLIER FUNCTION IS HERE--------------------
    public function AddSupplier(){
        return view('supplier.add_supplier');
    }

    public function InsertSupplier(Request $request){
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
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $supplier=DB::table('suppliers')
                         ->insert($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
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

    //ALL SUPPLIER LIST FUNCTION IS HERE------------------------
    public function AllSupplier(){

        $supplier=DB::table('suppliers')->get();
        return view('supplier.all_supplier', compact('supplier'));
    }


    //VIEW SUPPLIER FUNCTION IS HERE------------------------
    public function ViewSupplier(Request $request, $id){
        $view=DB::table('suppliers')->where('id',$id)->first();
        return view('supplier.view_supplier', compact('view'));
    }

    //DELETE SUPPLIER FUNCTION IS HERE------------------------------
    public function DeleteSupplier($id){
        $delete=DB::table('suppliers')->where('id',$id)->first();
        $photo=$delete->photo;
        unlink($photo);
        
        $dlt=DB::table('suppliers')->where('id',$id)->delete();
        

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully Supplier Deleted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.supplier')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }

    //EDIT SUPPLIER FUNCTION IS HERE--------------------------
    public function EditSupplier($id){
        $edt=DB::table('suppliers')->where('id',$id)->first();
        return view('supplier.edit_supplier', compact('edt'));
    }

    public function UpdateSupplier(Request $request, $id){
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
        $upload_path='public/supplier/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('suppliers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Supplier Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }




    //CLOSING TAG--------------------------------------
}
