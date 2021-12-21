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



use App\Http\Requests;

class BloodbankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "All Blood Bank";
      $subtitle="allBlood Bank";
      $activePage = "bloodbanks";
      $user_type='blood_bank';
      $dCount=User::where('user_type',$user_type)->count();
      $bloodbanks=User::where('user_type',$user_type)
         ->orderBy('id','DESC')
          ->sortable()->paginate(10);
  
        return view('admin.bblood_bank.list',compact('title','bloodbanks','activePage','subtitle','dCount'));
    }
  
  
    public function create()
    {
        $title = "Create New Blood Bank";
        $subtitle="Blood Bank";
        $activePage = "Blood Bank"; 
          return view('admin.bblood_bank.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
          'name' => 'required|min:3',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6',
          'mobile'=>'required'
          
          
        ]);    
        
          
  
  
        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'mobile' => $request->mobile,
           
            'user_type'=>'blood_bank'
          
        ];
  
        $result=User::create($data);
        return redirect(route('blood.bank.list'))->with('success', 'Blood Bank Successfully Added!');
    }
    
  
   
    public function edit(Request $request, $id)
    {
      $title = "Update Blood Bank";
      $subtitle="allBlood Bank";
      $activePage = "Blood Bank";
      $email=auth()->user()->email;
      $user_type='blood_bank';
     
      
      $user=User::where('id',$id)->where('user_type',$user_type)->first();
        return view('admin.bblood_bank.edit',compact('title','user','subtitle','activePage'));
    }
    public function saveImgupdate(Request $request, $id)
    {
  
      $email=auth()->user()->email;
      $user_type=auth()->user()->user_type;
  
  
    $image_name='';
  
    if ($request->hasFile('myImage')) {
        $file = $request->file('myImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
            if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
  
                    $image_name ='profile_img_'.time().'.'.$extension;
                    $destinationPath = public_path('/uploads/profile_img');
                    $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
       
    }
    $data=[
       
        'img' =>  $image_name,
        'updated_at'=>date('Y-m-d H:i:s')
    
      
    ];
  
    
    $result=User::where('id',$id)->update($data);
   
    return redirect()->back()->with('success', 'Profile Image Successfully Updated!');
    }
  
    
    public function update(Request $request, $id)
    {
  
      $title = "Update Blood Bank";
      $subtitle="allBlood Bank";
      $activePage = "Blood Bank";
  
      $this->validate(request(), [
        'name' => 'required|min:3',
        'email' => 'required',
        'mobile'=>'required',
        'status' => 'required',
        'biography'=>'required',
     
        'address' => 'required',
        'country' => 'required',
        'state' => 'required',
        'city' => 'required',
        'zipcode' => 'required',
      
    ]); 
    $data=[
      'name' => $request->name,
      'email' => $request->email,
        'secondary_email' => $request->secondary_email,
      'mobile' => $request->mobile,
      'biography' => $request->biography,
   
      'address' => $request->address,
      'country' => $request->country,
      'state' => $request->state,
      'city' => $request->city,
      'zipcode' => $request->zipcode,
  
      'status' => $request->status,
      'updated_at'=>date('Y-m-d H:i:s')
    
  ]; 
  $result=User::where('id',$id)->update($data);
      return redirect(route('blood.bank.list'))->with('success','Blood Bank Profile Successfully Updated!');
    }
  
    public function saveAccProfile(Request $request, $id)
    {
  
      $email=auth()->user()->email;
      $user_type=auth()->user()->user_type;
  
    $this->validate(request(), [
       
        'acc_holder_name'=>'required',
        'acc_number'=>'required',
        'ifsc_code'=>'required',
        'upi_id'=>'required',
       
     
    ]);
  
    $data=[
        'acc_holder_name' => $request->acc_holder_name,
        'acc_number' => $request->acc_number,
        'ifsc_code' => $request->ifsc_code,
        'upi_id' => $request->upi_id,
   
        'updated_at'=>date('Y-m-d H:i:s')
    
      
    ];
  
   
    $result=User::where('id',$id)->update($data);
    // print_r($data);
    return redirect()->back()->with('success', 'Payment Information Successfully Updated!');
    }
  
    public function view(Request $request, $id)
    {
      $title = "View Blood Bank";
      $subtitle="View Blood Bank";
      $activePage = "Blood Bank";
      $email=auth()->user()->email;
      $user_type='blood_bank';
     
      
      $user=User::where('id',$id)->where('user_type',$user_type)->first();
        return view('admin.bblood_bank.view',compact('title','user','subtitle','activePage'));
    }
    
    public function destroy(Request $request)
    {
      $id=$request->id; 
        
          $delete = User::where('id', $id)->delete();
          if ($delete){
      
                return ['success' => 1, 'Blood Bank Successfully Deleted!'];
                
              }
              else
                  {
                      return ['success' => 0, 'Error Occured!'];
               
                  }
    }
}
