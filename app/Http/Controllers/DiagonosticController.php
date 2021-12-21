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

class DiagonosticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "All Diagnostic";
      $subtitle="allDiagnostic";
      $activePage = "Diagnostic";
      $user_type='diagnostic';
      $dCount=User::where('user_type',$user_type)->count();
      $diagonostics=User::where('user_type',$user_type)
         ->orderBy('id','DESC')
          ->sortable()->paginate(10);
  
        return view('admin.bdiagonostics.list',compact('title','diagonostics','activePage','subtitle','dCount'));
    }
  
  
    public function create()
    {
        $title = "Create New Diagnostic";
        $subtitle="Diagnostic";
        $activePage = "Diagnostic"; 
          return view('admin.bdiagonostics.add',compact('title','activePage','subtitle'));
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
           
            'user_type'=>'diagnostic'
          
        ];
  
        $result=User::create($data);
        return redirect(route('diagonostics.list'))->with('success', 'Diagnostic Successfully Added!');
    }
    
  
   
    public function edit(Request $request, $id)
    {
      $title = "Update Diagnostic";
      $subtitle="All Diagnostic";
      $activePage = "Diagnostic";
      $email=auth()->user()->email;
      $user_type='diagnostic';
     
      
      $user=User::where('id',$id)->where('user_type',$user_type)->first();
        return view('admin.bdiagonostics.edit',compact('title','user','subtitle','activePage'));
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
  
      $title = "Update Diagnostic";
      $subtitle="Diagnostic";
      $activePage = "Diagnostic";
  
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
      return redirect(route('diagonostics.list'))->with('success','Diagnostic Profile Successfully Updated!');
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
    public function saveHospitalInfoProfile(Request $request, $id)
  {

    $email=auth()->user()->email;
    $user_type=auth()->user()->user_type;

  $this->validate(request(), [
     
      'hospital_name'=>'required',
      'hospital_address'=>'required',
      'hospital_reg'=>'required',
      'hospital_reg_year'=>'required',
      'price'=>'required'
     
   
  ]);

  $data=[
      'hospital_name' => $request->hospital_name,
      'hospital_address' => $request->hospital_address,
      'hospital_reg' => $request->hospital_reg,
      'hospital_reg_year' => $request->hospital_reg_year,
      'price' => $request->price,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  
  $result=User::where('id',$id)->update($data);
 
  return redirect()->back()->with('success', 'Hospital/Clinic Information  Successfully Updated!');
  }
  public function saveDecImgInfoProfile(Request $request, $id)
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

  
  $result=User::where('id',$id)->update($data);
 
  return redirect()->back()->with('success', 'Document & Hospital Image Successfully Updated!');
  }
  public function saveEducationProfile(Request $request, $id)
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

  
  $result=User::where('id',$id)->update($data);
 
  return redirect()->back()->with('success', 'Education Information  Successfully Updated!');
  }

  public function saveServicesDetaileProfile(Request $request, $id)
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

  
  $result=User::where('id',$id)->update($data);
 
  return redirect()->back()->with('success', 'Hospital/Clinic Information  Successfully Updated!');
  }

    public function view(Request $request, $id)
    {
      $title = "View Diagonostic";
      $subtitle="View Diagonostic";
      $activePage = "Diagonostic";
      $email=auth()->user()->email;
      $user_type='diagnostic';
     
      
      $user=User::where('id',$id)->where('user_type',$user_type)->first();
        return view('admin.bdiagonostics.view',compact('title','user','subtitle','activePage'));
    }
    
    public function destroy(Request $request)
    {
      $id=$request->id; 
        
          $delete = User::where('id', $id)->delete();
          if ($delete){
      
                return ['success' => 1, 'Diagnostic Successfully Deleted!'];
                
              }
              else
                  {
                      return ['success' => 0, 'Error Occured!'];
               
                  }
    }
}
