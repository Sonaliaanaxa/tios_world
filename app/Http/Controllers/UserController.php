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

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {

  }

  

  public function edit(Request $request, $id)
  {
  }

  
  public function update(Request $request, $id)
  {
  }
  public function destroy(Request $request)
  {
  }
  public function myProfile(Request $request)
  {
    $title = "My Profile";
    $subtitle="Profile";
    $activePage = "Web";
    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;
    
    $user=User::where('user_type',$user_type)->where('email',$email)->first();
      return view('admin.profile.view',compact('title','user','subtitle','activePage'));
  }
  public function editMyProfile(Request $request)
  {
    $title = "My Profile";
    $subtitle="Profile";
    $activePage = "Web";
    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;
    
    $user=User::where('user_type',$user_type)->where('email',$email)->first();
      return view('admin.profile.edit',compact('title','user','subtitle','activePage'));
  }

  public function saveImgMyProfile(Request $request)
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

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Profile Image Successfully Updated!');
  }

  public function saveDecImgMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;


  $image_name='';

  if ($request->hasFile('myImage')) {
      $file = $request->file('myImage');
      $extension = $file->getClientOriginalExtension(); // getting image extension
          if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
          {

                  $image_name ='dec_img1_'.time().'.'.$extension;
                  $destinationPath = public_path('/uploads/profile_img');
                  $file->move($destinationPath, $image_name);
          }
          else
          {
              return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
          }
     
  }

  $image_name1='';

  if ($request->hasFile('myImage1')) {
      $file = $request->file('myImage1');
      $extension = $file->getClientOriginalExtension(); // getting image extension
          if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
          {

                  $image_name1 ='dec_img2_'.time().'.'.$extension;
                  $destinationPath = public_path('/uploads/profile_img');
                  $file->move($destinationPath, $image_name1);
          }
          else
          {
              return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
          }
     
  }

  $image_name2='';

  if ($request->hasFile('myImage2')) {
      $file = $request->file('myImage2');
      $extension = $file->getClientOriginalExtension(); // getting image extension
          if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
          {

                  $image_name2 ='hos_img1_'.time().'.'.$extension;
                  $destinationPath = public_path('/uploads/profile_img');
                  $file->move($destinationPath, $image_name2);
          }
          else
          {
              return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
          }
     
  }
  $image_name3='';

  if ($request->hasFile('myImage3')) {
      $file = $request->file('myImage3');
      $extension = $file->getClientOriginalExtension(); // getting image extension
          if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
          {

                  $image_name3 ='hos_img2_'.time().'.'.$extension;
                  $destinationPath = public_path('/uploads/profile_img');
                  $file->move($destinationPath, $image_name3);
          }
          else
          {
              return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
          }
     
  }
  $data=[
     
      'dec_img1' =>  $image_name,
      'dec_img2' =>  $image_name1,
      'hospital_img1' =>  $image_name2,
      'hospital_img2' =>  $image_name3,
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Document & Hospital Image Successfully Updated!');
  }

  public function saveBasicMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
      'name' => 'required|min:3',
      'mobile'=>'required',
      'biography'=>'required',
      'email' => 'required',
      'address' => 'required',
      'country' => 'required',
      'state' => 'required',
      'city' => 'required',
      'zipcode' => 'required',
   
  ]);

  $data=[
      'name' => $request->name,
      'mobile' => $request->mobile,
      
      'biography' => $request->biography,
      'email' => $request->email,
        'secondary_email' => $request->secondary_email,
      'address' => $request->address,
      'country' => $request->country,
      'state' => $request->state,
      'city' => $request->city,
      'zipcode' => $request->zipcode,
    
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Basic Information Successfully Updated!');
  }
  public function saveGeneralMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
     
      'gender'=>'required',
      'dbd'=>'required',
     
   
  ]);

  $data=[
      'gender' => $request->gender,
      'dbd' => $request->dbd,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'General Information Successfully Updated!');
  }

  public function saveAccMyProfile(Request $request)
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

 
  User::where('email',$email)->update($data);
  // print_r($data);
  return redirect()->back()->with('success', 'Payment Information Successfully Updated!');
  }

  public function saveHospitalMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
     
      'hospital_name'=>'required',
      'hospital_address'=>'required',
      'hospital_reg'=>'required',
      'hospital_reg_year'=>'required',
      'price'=>'required',
      'unit'=>'required',
     
   
  ]);

  $data=[
      'hospital_name' => $request->hospital_name,
      'hospital_address' => $request->hospital_address,
      'hospital_reg' => $request->hospital_reg,
      'hospital_reg_year' => $request->hospital_reg_year,
      'price' => $request->price,
      'unit' => $request->unit,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Hospital/Clinic Information  Successfully Updated!');
  }
  public function saveEducationMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
     
      'degree'=>'required',
      'collage'=>'required',
      'ed_year'=>'required'
     
   
  ]);

  $data=[
      'degree' => $request->degree,
      'collage' => $request->collage,
      'ed_year' => $request->ed_year,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Education Information  Successfully Updated!');
  }

  public function saveServicesDetaileMyProfile(Request $request)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
     
      'services'=>'required',
      'specialization'=>'required',
      'total_experience'=>'required',
      'designation'=>'required'
     
   
  ]);

  $data=[
      'services' => $request->services,
      'specialization' => $request->specialization,
      'total_experience' => $request->total_experience,
      'designation' => $request->designation,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  User::where('email',$email)->update($data);
 
  return redirect()->back()->with('success', 'Hospital/Clinic Information  Successfully Updated!');
  }

  public function editPassword(Request $request)
  {
    $title = "My Profile";
    $subtitle="Password";
    $activePage = "Web";
    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;
    
    $user=User::select('password')->where('user_type',$user_type)->where('email',$email)->first();
    //echo $user['password'];
      return view('admin.auth.passwords.edit',compact('title','user','subtitle','activePage'));
  }
  public function savePassword(Request $request)
  {
    
    $this->validate(request(), [
      'password' => 'required|min:6'
    
  ]);    
  
    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

    // $user=User::select('password')->where('user_type',$user_type)->where('email',$email)->first();
   // echo $user['password'].'<br>';

    $data['password']= Hash::make($request->password);
    $data['password']=bcrypt($request->password);

    //echo $data['password'];
    
  
        User::where('email',$email)->update($data);
        
    return redirect()->back()->with('success','Password Successfully Updated!');
  }

  public function updateUserPassword(Request $request, $id)
            {
                       $title = "Update User Password";
                        $activePage = "Update User Password";
                        $subtitle='Update User Password';
                        $userInfo=User::select('name','user_type')->where('id',$id)->first();
                        return view('admin.auth.passwords.user_password',compact('title','activePage','subtitle','id','userInfo'));
            }


            public function saveUserPassword(Request $request,$id)
            {
              
                        $this->validate(request(), [
                            'password' => 'required|min:6'
                        
                        ]);    
                        
                    
                        $data['password']= Hash::make($request->password);
                        $data['password']=bcrypt($request->password);
                    
                        $user_type=auth()->user()->user_type;

                        if($user_type=='admin')
                        {
                            User::where('id',$id)->update($data);
                            return redirect()->back()->with('success','Password Successfully Updated!');
                        }
               

              
            }

            public function approveUpdate(Request $request)
            {
                $id=$request->id; 
                $data['approve']=$request->approve; 
                $res=User::where('id',$id)->update($data);
               
                if ($res){
            
                 
                      return ['success' => 1, 'Approve Successfully Updated!'];
                      
                    }
                    else
                        {
                            return ['success' => 0, 'Error Occured!'];
                     
                        }     
            }
        
        
        
     
        
}
