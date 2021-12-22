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




class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "All Customer";
      $subtitle="customer";
      $activePage = "customer";
      $role='customer';
      $dCount=User::where('user_type',$role)->count();
      $customer=User::where('user_type',$role)
         ->orderBy('id','DESC')
          ->sortable()->paginate(10);
  
        return view('admin.customer.list',compact('title','customer','activePage','subtitle','dCount'));
    }
  
  
    public function create()
    {
        $title = "Create New Customer";
        $subtitle="Customer";
        $activePage = "Customer"; 
        return view('admin.customer.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
      $input = $request->all();
      $validator = Validator::make($input, [
          'name' => 'required',
          'email' => 'required|unique:users',
          'phone' => 'required|unique:users',
      ]);
      
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='customer_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/profile_img');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        } 
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->user_type = 'customer';
            $user->business_title = $request->business_title;
            $user->tag_line = $request->tag_line;
            $user->about_business = $request->about_business ;
            $user->image = $image_name;
            $user->save();

           
            return redirect(route('customer.list'))->with('success', '  Customer Successfully Added!');
    }
    
  
   
    public function edit(Request $request, $id)
    {
      $title = "Update Employee";
      $subtitle="allEmployee";
      $activePage = "Employee";
      $email=auth()->user()->email;
     
     
      
      $customer=User::where('id',$id)->first();
        return view('admin.customer.edit',compact('title','customer','subtitle','activePage'));
    }
   
    
    public function update(Request $request, $id)
    {
  
      $title = "Update Employee";
      $subtitle="allEmployee";
      $activePage = "Employee";
  
      $this->validate(request(), [
        'name' => 'required|min:3',
          'email' => 'required|email',
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
           
            'user_type'=>$request->user_type,
            'img' =>  $image_name,
      'updated_at'=>date('Y-m-d H:i:s')
    
  ]; 
}else
{
    $data=[
        'name' => $request->name,
        'email' => $request->email,
       
        'user_type'=>$request->user_type,
        'updated_at'=>date('Y-m-d H:i:s')
    ];
}
  $result=User::where('id',$id)->update($data);
      return redirect(route('customer.list'))->with('success','Customer Details Successfully Updated!');
    }
   
    
    public function destroy(Request $request)
    {
      $id=$request->id; 
        
          $delete = User::where('id', $id)->delete();
          if ($delete){
      
                return ['success' => 1, 'Customer Successfully Deleted!'];
                
              }
              else
                  {
                      return ['success' => 0, 'Error Occured!'];
               
                  }
    }
}
