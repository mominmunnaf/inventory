<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class EmployeeController extends Controller
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

    public function AddEmployee(){
        return view('employee.add_employee');
    }

    public function InsertEmployee(Request $request){
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['fname']=$request->fname;
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['nid']=$request->nid;
        $data['email']=$request->email;
        $data['salary']=$request->salary;
        $data['experience']=$request->experience; 
        
        $image=$request->file('photo');

        if ($image) {
            $image_name= str::random(7);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
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

    public function AllEmployee(){

        $employees=DB::table('employees')->get();
        return view('employee.all_employee', compact('employees'));
    }

    //EDIT EMPLOYEE FUNCTION IS HERE--------------------------
    public function EditEmployee($id){
        $edt=DB::table('employees')->where('id',$id)->first();
        return view('employee.edit_employee', compact('edt'));
    }

    public function UpdateEmployee(Request $request, $id){
        $data=array();
        $data['name']=$request->name;
        $data['fname']=$request->fname;
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['nid']=$request->nid;
        $data['email']=$request->email;
        $data['salary']=$request->salary;
        $data['experience']=$request->experience;
        $image=$request->photo;

        if ($image) {
        $image_name=str::random(7);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/employee/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if ($success) {
          $data['photo']=$image_url;
             $img=DB::table('employees')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
      }else{
         $oldphoto=$request->old_photo;
         if ($oldphoto) {
          $data['photo']=$oldphoto;  
          $user=DB::table('employees')->where('id',$id)->update($data); 
         if ($user) {
                $notification=array(
                'messege'=>'Employee Update Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
              return Redirect()->back();
             } 
          }
       }
    }

        

    public function ViewEmployee(Request $request, $id){
        $view=DB::table('employees')->where('id',$id)->first();
        return view('employee.view_employee', compact('view'));
    }


    //DELETE EMPLOYEE FUNCTION IS HERE------------------------------
    public function DeleteEmployee($id){
        $delete=DB::table('employees')->where('id',$id)->first();
        $photo=$delete->photo;
        unlink($photo);
        
        $dlt=DB::table('employees')->where('id',$id)->delete();
        

        if ($dlt) {
            $notification=array(
            'messege'=>'Successfully Employee Deleted ',
            'alert-type'=>'success'
             );
           return Redirect()->route('all.employee')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }


    

}
