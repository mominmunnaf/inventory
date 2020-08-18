<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class CategoryController extends Controller
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

    //ADD CATEGORY FUNCTION IS HERE--------------------
    public function AddCategory(){
        return view('category.add_category');
    }

    public function InsertCategory(Request $request){
        $data=array();
        $data['catName']=$request->catName;
        $category=DB::table('categories')
                         ->insert($data);
        if ($category) {
            $notification=array(
            'messege'=>'Successfully Cagetory Inserted ',
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
    }

    //ALL CATEGORY LIST FUNCTION IS HERE------------------------
    public function AllCategory(){

        $category=DB::table('categories')->get();
        return view('category.all_category', compact('category'));
    }


        //DELETE CATEGORY FUNCTION IS HERE------------------------------
    public function DeleteCategory($id){
        $delete=DB::table('categories')->where('id',$id)->first();
       
        $dlt=DB::table('categories')->where('id',$id)->delete();
        

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully category Deleted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.category')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }

    //EDIT CATEGORY FUNCTION IS HERE--------------------------
    public function EditCategory($id){
        $edt=DB::table('categories')->where('id',$id)->first();
        return view('category.edit_category', compact('edt'));
    }

    public function UpdateCategory(Request $request, $id){
        $data=array();
        $data['catName']=$request->catName;


        $user=DB::table('categories')->where('id',$id)->update($data); 
        if ($user) {
            $notification=array(
            'messege'=>'Successfully Cagetory Inserted ',
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
    }
         
        







         
    



    //CLOSING TAG--------------------------------------
}
