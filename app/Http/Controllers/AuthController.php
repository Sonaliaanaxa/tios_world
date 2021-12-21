<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blogs;
use App\LoginDetail;


// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Http\Request;
// // use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\RegistersUsers;
 use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Facades\Image;
// use App\Http\Controllers\Redirect;
 use DB;

// use Mail;
// use App\Http\Requests;

class AuthController extends Controller
{

    public function loginPage()
    {
    


            $title = "Login";

   $data = DB::table('users')->where('user_type','doctor')->orderBy('id','desc')->get();
   foreach($data as $row){
    $ids = $row->id;
    $email = $row->email;
    $phone = $row->mobile;
    $name = $row->name;
    $price = $row->price;
    $img = $row->img;
    $dbd = $row->dbd;
    $gender = $row->gender;
    $bio = $row->biography;
    $hospital_name = $row->hospital_name;
    $hospital_address = $row->hospital_address;
    $hospital_img1 = $row->hospital_img1;
    $hospital_img2 = $row->hospital_img2;
    $acc_holder_name = $row->acc_holder_name;
    $acc_number = $row->acc_number;
    $ifsc_code = $row->ifsc_code;
    $upi_id = $row->upi_id;
    $address = $row->address;
    $city = $row->city;
    $state = $row->state;
    $country = $row->country;
    $status = $row->status;
    $zipcode = $row->zipcode;
    $services = $row->services;
    $specialization = $row->specialization;
     $degree = $row->degree;
    $collage = $row->collage;
      $ed_year = $row->ed_year;
      $hospital_reg = $row->hospital_reg;
      $hospital_reg_year = $row->hospital_reg_year;
    
   
$dd=array('userid'=>$ids,
  'email'=>$email,
  'phone'=>$phone,
  'name'=>$name,
  'first_name'=>$name,
  'price'=>$price,
  'status'=>$status,
  'doctor_image'=>$img,
  'gender'=>$gender,
  'dob'=>$dbd,
  'bio'=>$bio,
  'clinic_name'=>$hospital_name,
  'clinic_address'=>$hospital_address,
  'clinic_image'=>$hospital_img1,
  'account_holder_name'=>$acc_holder_name,
  'account_number'=>$acc_number,
  'ifsc'=>$ifsc_code,
  'upi_id'=>$upi_id,
  'address'=>$address,
  'city'=>$city,
  'state'=>$state,
  'country'=>$country,
  'postal_code'=>$zipcode,
  'services'=>$services,
  'specialist'=>$specialization,
  'degree1'=>$degree,
  'college1'=>$collage,
  'year1'=>$ed_year,
  'degree2'=>'',
  'college2'=>'',
  'year2'=>'',
  'degree3'=>'',
  'college3'=>'',
  'year3'=>'',
  'hospital_name1'=>$hospital_reg,
  'from1'=>'',
  'to1'=>$hospital_reg_year,
  'designation1'=>'',
  'hospital_name2'=>'',
  'from2'=>'',
  'to2'=>'',
  'designation1'=>'',
  'award1'=>'',
  'award_year'=>'',
  'membership'=>'');




   $users_count = DB::table('doctorprofiles')
     ->where('userid', $ids)
     ->count();
     if(!$users_count){

DB::table('doctorprofiles')->insert($dd);
     }
     else{
    DB::table('doctorprofiles')->where('userid',$row->id)->update($dd);
      
     }
   }
      
            return view('home.auth.login',compact('title'));
    
     
    }


    public function login(Request $request)
    {

        $email      = $request->email;
      $password   = $request->password;
  
      $this->validate(request(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

      
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('error', 'The email or password is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
 
             return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
           {
       
            return redirect(route('doctor.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
           {
     
            return redirect(route('blood_bank.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagnostic')
           {
     
            return redirect(route('diagonostics.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
           {
     
            return redirect(route('hospital.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
           {
     
            return redirect(route('pharmacy.dashboard'))->with('success', 'Login Successful!');
           }
                 elseif(auth()->user()->status=='1' && auth()->user()->user_type=='editor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='author')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='contributor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='subscriber')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(isset(auth()->user()->user_type)=='patient')
           {
           
         
            return redirect(route('home'))->with('success', 'Login Successful!');
           }
           
            
           else
           {
            auth()->logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }



    public function phonelogin(Request $request)
    {

        $mobile      = $request->mobile;
      $password   = $request->password;
  


      
        if (auth()->attempt(request(['mobile', 'password'])) == false) {
            return back()->with('error', 'The mobile or password is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
           {
       
            return redirect(route('doctor.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
           {
     
            return redirect(route('blood_bank.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagonostics')
           {
     
            return redirect(route('diagonostics.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
           {
     
            return redirect(route('hospital.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
           {
     
            return redirect(route('pharmacy.dashboard'))->with('success', 'Login Successful!');
           }
                 elseif(auth()->user()->status=='1' && auth()->user()->user_type=='editor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='author')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='contributor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='subscriber')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(isset(auth()->user()->user_type)=='patient')
           {
           
         
            return redirect(route('home'))->with('success', 'Login Successful!');
           }
           
       
           else
           {
            auth()->logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }


// ----------login Model ------------------------------------//
   
    public function loginModel(Request $request)
    {

        $email      = $request->email;
      $password   = $request->password;
  
      $this->validate(request(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

      
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('error', 'The email or password is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
 
             return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
           {
       
            return redirect(route('doctor.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
           {
     
            return redirect(route('blood_bank.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagnostic')
           {
     
            return redirect(route('diagonostics.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
           {
     
            return redirect(route('hospital.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
           {
     
            return redirect(route('pharmacy.dashboard'))->with('success', 'Login Successful!');
           }
                 elseif(auth()->user()->status=='1' && auth()->user()->user_type=='editor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='author')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='contributor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='subscriber')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(isset(auth()->user()->user_type)=='patient')
           {
           
            return redirect()->back()->with('success', 'Login Successful!');
           }
           
            
           else
           {
            auth()->logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }



    public function phoneloginModel(Request $request)
    {

        $mobile      = $request->mobile;
      $password   = $request->password;
  


      
        if (auth()->attempt(request(['mobile', 'password'])) == false) {
            return back()->with('error', 'The mobile or password is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
           {
       
            return redirect(route('doctor.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
           {
     
            return redirect(route('blood_bank.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagonostics')
           {
     
            return redirect(route('diagonostics.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
           {
     
            return redirect(route('hospital.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
           {
     
            return redirect(route('pharmacy.dashboard'))->with('success', 'Login Successful!');
           }
                 elseif(auth()->user()->status=='1' && auth()->user()->user_type=='editor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='author')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='contributor')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
                elseif(auth()->user()->status=='1' && auth()->user()->user_type=='subscriber')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Login Successful!');
           }
           elseif(isset(auth()->user()->user_type)=='patient')
           {
           
           return redirect()->back()->with('success', 'Login Successful!');
           }
           
       
           else
           {
            auth()->logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
    }
  
// ----------End login Model ------------------------------------//

    //-------------------User Register---------------------------------

    public function registerPage()
    {
      
            $title = "Register";
            return view('home.auth.register',compact('title'));
     
     
    }
   

  
    public function register(Request $request)
    {

        $email      = $request->email;
       $password   = $request->password;
       
       $data1=array();
    $this->validate(request(), [
        'name' => 'required|min:3',
      
        'password' => 'required|min:6',
        'mobile'=>'required|unique:users',
       'user_type'=>'required'
    ]);


    $image_name='';

    if ($request->hasFile('myImage')) {
        $file = $request->file('myImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
            if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {

                    $image_name ='profile_img_'.time().'.'.$extension;
                    $destinationPath = public_path('/uploads/profile_img');
                    $file->move($destinationPath, $image_name);
                    $data1['img']=$image_name;
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
       
    }
    $data2=[
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'mobile' => $request->mobile,
           'referral' => $request->referral,
        'user_type' => $request->user_type,
      
  
      
    ];
    
      $reference="R".rand(1200,1000).rand(500,100000);
        $data4['reference']=$reference;
    
      $phone=$request->mobile;
        $mobile_otp=rand(1000,9999);
                $data3['mobile_otp']=$mobile_otp;
    
    $data=array_merge($data1,$data2,$data3,$data4);
   
    $result=User::create($data);
        
      $to = $request->email;
               $subject = "Your Registeration is  Successfully Submitted.";
               $txt = "Welcome to Social Vaidya !
              
               name : $request->name .
               email : $request->email .
               Password : $request->password .
        
           
               Website Link :http://medto.in/";
          
      
             
               $headers = "From: admin@medto.in";
             
              
               mail($to,$subject,$txt,$headers);
               
               



$api_key = '36012AD7175995';
$contacts = $phone;
$from = 'SVMEDT';
$sms_text = urlencode('Hi, Your OTP is '.$mobile_otp.'. SOCIAL VAIDYA MEDICAL PRIVATE LIMITED');
$template_id = '1007345847224280162';

$api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=10709&routeid=37&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=".$template_id;
//print_r($api_url);die;

                  $ch = curl_init();
                            // Set The Response Format to Json
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                            // Disable SSL verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            // Will return the response, if false it print the response
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            // Set the url
                            curl_setopt($ch, CURLOPT_URL, $api_url);
                            // Execute
                            $result = curl_exec($ch);
                        //echo"<pre>";print_r($result);
                            // Closing
                            curl_close($ch);







//Submit to server

$output =  $result;
//echo $response;



  
 $to   = $phone;


//$url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=10709&routeid=7&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=".$template_id;
//   // Send the request
 // $output = file($url);


            if (auth()->attempt(request(['email', 'password'])) == false) {
                return back()->with('error', 'The email or password is incorrect, please try again');
            }
    
           else{
               if(auth()->user()->status=='1' && auth()->user()->user_type=='patient')
               {
            
                     return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
               {
            
                     return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
               {
            
                   return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagnostic')
               {
            
              return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
               {
            
                   return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
               {
            
                    return redirect(route('phone.otp'))->with('success', 'Submitted.');
               }
               
               
               else
               {
                auth()->logout();
                return back()->with('error', 'Invalid Credentials!');
               }
         
           }
           

         
    }

    public function otpPageCreate()
    {
    


            $title = "OTP";
      
            return view('home.auth.otp-page',compact('title'));
    
     
    }
public function otpPageSave(Request $request)
    {

        $mobile_otp = $request->mobile_otp;
        
        $mobile=auth()->user()->mobile_otp;
  
      $this->validate(request(), [
        'mobile_otp' => 'required'
    ]);
 //print_r($mobile_otp);print_r('-');print_r($mobile);print_r('-');
   // print_r(strcmp($mobile_otp, $mobile));die; 
        //if (auth()->attempt(request(['mobile_otp','mobile'])) == false) {
        if (strcmp($mobile_otp, $mobile) !== 0) { 
            return back()->with('error', 'The OTP is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
        
                 return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='doctor')
           {
       
            return redirect(route('doctor.dashboard'))->with('success', 'Registeration Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='blood_bank')
           {
     
            return redirect(route('blood_bank.dashboard'))->with('success', 'Registeration Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='diagonostics')
           {
     
            return redirect(route('diagonostics.dashboard'))->with('success', 'Registeration Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='hospital')
           {
     
            return redirect(route('hospital.dashboard'))->with('success', 'Registeration Successful!');
           }
           elseif(auth()->user()->status=='1' && auth()->user()->user_type=='pharmacy')
           {
     
            return redirect(route('pharmacy.dashboard'))->with('success', 'Registeration Successful!');
           }
           elseif(isset(auth()->user()->user_type)=='patient')
           {
           
            return redirect(route('home'))->with('success', 'Login Successful!');
           }
           else
           {
            auth()->logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }



    public function logout(Request $request)
    {
        //Session::flush();
        if( auth()->user()->user_type=='admin')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='patient')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='pharmacy')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='hospital')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='diagnostic')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='blood_bank')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='doctor')
        {
            auth()->logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        else
        {
         auth()->logout();
         return back()->with('success', 'You have logged out!');
        }
        
    }



  


    //-------------------Password recovery-------------------------------
    public function passwordRecovery()
    {
        
            $title = "Password Recovery";
            return view('home.auth.password-recovery',compact('title'));
        
     
    }

    public function passwordRecoveryMailSend(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email'
        ]);

        $email=$request->email;
        $res=User::where('email',$email)->count();
        if($res==1)
        {
            $new_pass=rand(100000,9999999);
            $data['password']= Hash::make($new_pass);
            $data['password']=bcrypt($new_pass);

           
          
             User::where('email',$email)->update($data);
                  $to = $request->email;
               $subject = "Your New Password.";
               $txt = "Welcome to Social Vaidya !
              
              
               email : $request->email
               Password : $new_pass
        
           
               Website Link :http://medto.in/";
          
      
             
               $headers = "From: admin@medto.in";
             
              
               mail($to,$subject,$txt,$headers);
             
            return redirect(route('login'))->with('success','New password has sent on your registered email address!');
        }
        else
        {
            return back()->with('error','Email does not exist!');
        }
            
        
     
    }
   

}
