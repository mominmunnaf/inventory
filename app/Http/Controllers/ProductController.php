<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;


class ProductController extends Controller
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

    //ADD PRODUCT FUNCTION IS HERE--------------------
    public function AddProduct(){
        return view('product.add_product');
    }

    public function InsertProduct(Request $request){
        $data=array();
        $data['name']=$request->name;        
        $data['code']=$request->code;
        $data['catId']=$request->catId;
        $data['supId']=$request->supId;
        $data['godown']=$request->godown;      
        $data['route']=$request->route;      
        $data['buyDate']=$request->buyDate;      
        $data['sellDate']=$request->sellDate;      
        $data['buyPrice']=$request->buyPrice;          
        $data['sellPrice']=$request->sellPrice;      
        
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(7);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $product=DB::table('products')
                         ->insert($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully product Inserted ',
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

    //ALL PRODUCT LIST FUNCTION IS HERE------------------------
    public function AllProduct(){

        $product=DB::table('products')->get();
        return view('product.all_product', compact('product'));
    }


    //VIEW PRODUCT FUNCTION IS HERE------------------------
    public function ViewProduct(Request $request, $id){
        $view=DB::table('products')
                ->join('categories','products.catID','categories.id')
                ->join('suppliers','products.supId','suppliers.id')
                ->select('categories.catName','products.*','suppliers.shopName')
                ->where('products.id',$id)
                ->first();
        return view('product.view_product', compact('view'));
    }

    //DELETE PRODUCT FUNCTION IS HERE------------------------------
    public function DeleteProduct($id){
        $delete=DB::table('products')->where('id',$id)->first();
        $photo=$delete->photo;
        unlink($photo);
        
        $dlt=DB::table('products')->where('id',$id)->delete();
        

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully product Deleted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.product')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }

    //EDIT PRODUCT FUNCTION IS HERE--------------------------
    public function EditProduct($id){
        $edt=DB::table('products')
        ->join('categories','products.catId','categories.id')
        ->join('suppliers','products.supId','suppliers.id')
        ->select('categories.catName','products.*','suppliers.shopName')
        ->where('products.id',$id)
        ->first();
        return view('product.edit_product', compact('edt'));
    }

    public function UpdateProduct(Request $request, $id){
        $data=array();
        $data['name']=$request->name;        
        $data['code']=$request->code;
        $data['catid']=$request->catName;
        $data['supId']=$request->shopName;
        $data['godown']=$request->godown;      
        $data['route']=$request->route;      
        $data['buyDate']=$request->buyDate;      
        $data['sellDate']=$request->sellDate;      
        $data['buyPrice']=$request->buyPrice;          
        $data['sellPrice']=$request->sellPrice;

        $image=$request->photo;

        if ($image) {
        $image_name=str::random(7);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/product/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('products')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'product Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.product')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('products')->where('id',$id)->update($data); 
            if ($user) {
                    $notification=array(
                    'messege'=>'product Update Successfully',
                    'alert-type'=>'success'
                    );
                return Redirect()->route('all.product')->with($notification);                      
                }else{
                return Redirect()->back();
                } 
            }
       }
    }


    //IMPORT EXPORT FUNCTIONS ARE HERE-------------------
    public function ImportProduct(){
        return view('product.import_product');
    }

    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');
        
    }

    public function import(Request $request){
        $user=Excel::import(new ProductsImport, $request->file('importFile'));

        if ($user) {
            $notification=array(
            'messege'=>'Product Uploaded Successfully',
            'alert-type'=>'success'
            );
                return Redirect()->route('all.product')->with($notification);                      
                }else{
                return Redirect()->back();
                } 

        
    }




    //CLOSING TAG--------------------------------------
}
