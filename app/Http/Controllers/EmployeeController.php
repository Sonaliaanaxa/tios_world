<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;

use App\User; 




class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "All Employee";
      $subtitle="allEmployee";
      $activePage = "Employee";
      $role='employee';
      $dCount=User::where('role',$role)->count();
      $employee=User::where('role',$role)
         ->orderBy('id','DESC')
          ->sortable()->paginate(10);
  
        return view('admin.employee.list',compact('title','employee','activePage','subtitle','dCount'));
    }
  
  
    public function create()
    {
        $title = "Create New Employee";
        $subtitle="Employee";
        $activePage = "Employee"; 
          return view('admin.employee.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
          'name' => 'required|min:3',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6',
          'mobile'=>'required',
          'user_type'=>'required',
        
          
          
        ]);    
        
              
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='employee_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/profile_img');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        } 
  
  
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'mobile' => $request->mobile,
           
            'user_type'=>$request->user_type,
            'img' =>  $image_name,
            'role'=>'employee'
          
        ];
  
        $result=User::create($data);
        return redirect(route('employee.list'))->with('success', 'Employee Successfully Added!');
    }
    
  
   
    public function edit(Request $request, $id)
    {
      $title = "Update Employee";
      $subtitle="allEmployee";
      $activePage = "Employee";
      $email=auth()->user()->email;
     
     
      
      $employee=User::where('id',$id)->first();
        return view('admin.employee.edit',compact('title','employee','subtitle','activePage'));
    }
   
    
    public function update(Request $request, $id)
    {
  
      $title = "Update Employee";
      $subtitle="allEmployee";
      $activePage = "Employee";
  
      $this->validate(request(), [
        'name' => 'required|min:3',
          'email' => 'required|email',
         
          'mobile'=>'required',
          'user_type'=>'required'
        
          
          
        ]);    
        
              
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='employee_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/profile_img');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
     
  
  
        $data=[
            'name' => $request->name,
            'email' => $request->email,
          
            'mobile' => $request->mobile,
           
            'user_type'=>$request->user_type,
            'img' =>  $image_name,
      'updated_at'=>date('Y-m-d H:i:s')
    
  ]; 
}else
{
    $data=[
        'name' => $request->name,
        'email' => $request->email,
    
        'mobile' => $request->mobile,
       
        'user_type'=>$request->user_type,
        'updated_at'=>date('Y-m-d H:i:s')
    ];
}
  $result=User::where('id',$id)->update($data);
      return redirect(route('employee.list'))->with('success','Employee Profile Successfully Updated!');
    }
   
    
    public function destroy(Request $request)
    {
      $id=$request->id; 
        
          $delete = User::where('id', $id)->delete();
          if ($delete){
      
                return ['success' => 1, 'Employee Successfully Deleted!'];
                
              }
              else
                  {
                      return ['success' => 0, 'Error Occured!'];
               
                  }
    }
}
