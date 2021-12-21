<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Http\Request;
// // use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\RegistersUsers;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Facades\Image;
// use App\Http\Controllers\Redirect;
 use DB;
 use Session;

// use Mail;
// use App\Http\Requests;

class AuthController extends Controller
{

    public function sendotp(Request $request){
        $mobile = $request->mobile;
        // $otp = rand(1000,9999);
        $otp = "1234";
        Session::put('mobile',$mobile);
        Session::put('otp',$otp);

        return $mobile.'=='.$otp;
        

    }

    public function userLogin(Request $request){

        $phone = $request->phone;
        $otp = $request->verification_code;

        if($phone == Session::get('mobile') && $otp == Session::get('otp')){
            $user = User::where('phone',$phone)->first();
            if($user){
                User::where('id',$user->id)->update(['mobile_otp'=>$otp]);
                // $authentication = Auth::attempt(['phone' => $phone,'password'=>null,'status'=>'1']);
                $usr = User::where(['phone' => $phone,'status'=>'1'])->first();
                $authentication = Auth::login($usr);

                if($authentication == true){
                    return redirect()->back();
                }else{
                    Session::flash('loginfalse','You are not authorized to login here!');
                    return redirect()->back();
                }
            }else{
                Session::flash('usersignup','Please enter the details to proceed!');
                return redirect()->back();
            }
            

        }else{
            return redirect()->back();
        }


    }

    public function userRegister(Request $request){

        $fname = $request->fname;
        $lname = $request->lname;
        $name = $fname.' '.$lname;
        $email = $request->email;
        $phone = Session::get('mobile');
        $otp = Session::get('otp');

        $user = new User;
        $user->name = $name;
        $user->fname = $fname;
        $user->lname = $lname;
        $user->email = $email;
        $user->phone = $phone;
        $user->mobile_otp = $otp;
        $user->user_type = 'customer';
        $user->status = '1';
        $user->save();

        $usr = User::where(['phone' => $phone,'status'=>'1'])->first();
        $authentication = Auth::login($usr);
        if($authentication == true){
            return redirect()->back();
        }else{
            Session::flash('loginfalse','You are not authorized to login here!');
            return redirect()->back();
        }


    }



    public function loginPage()
    {
       $title = "Login";
      return view('admin.login',compact('title')); 
    }

    public function userLoginPage(){
      $title = "User Login";
      return view('front.index', compact('title'));
    }
//     public function userLogin(Request $request) {
//         $validator = Validator::make($request->all(),[
//             'phone' => 'required|unique:users|digits:10',
//             'mobile_otp' => 'required'
//         ]);

      
//        $otpcode= '1234';
       
//          $phone = $request->phone;
//           $user_record=User::where('phone',$phone)->first();
//           if ($validator->fails()){
//             return back()->with('error', $validator->errors());
//           }
//           else {
//            if($user_record){
//               User::wherePhone($phone)
//                   ->update([
//                     'mobile_otp' => $otpcode,
//                     'otp_expires_time' => (int) strtotime(Carbon::now())+1800
//                   ]);
//             }

//             else {
//               $user = new User;
//               $user->phone = $phone;
//               $user->mobile_otp = $otpcode;
//               $user->otp_expires_time = (int) strtotime(Carbon::now())+1800;
//               $user->save();
//             }
//             if($request->phone !=  $phone && $request->mobile_otp != $otpcode)
//             {
//                 return back()->with('error', 'The phone no or otp is incorrect, please try again');
//             }
//             else {
//                     return redirect(route('myProfile'))->with('success', 'Welcome');  
//                 }
//     }    
// }


    public function login(Request $request)
    {
      $email      = $request->email;
      $password   = $request->password;
      $this->validate(request(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

      
        if (Auth::attempt(request(['email', 'password'])) == false) {
            return back()->with('error', 'The email or password is incorrect, please try again');
        }

       else{
           if(auth()->user()->status=='1' && auth()->user()->user_type=='admin')
           {
 
             return redirect(route('admin.dashboard'))->with('success', 'Welcome');
           }
           else
           {
            Auth::logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }



    

    
    //-------------------User Register---------------------------------

    public function registerPage()
    {
      
            $title = "Register";
            return view('home.auth.register',compact('title')); 
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
           
          
           else
           {
            Auth::logout();
            return back()->with('error', 'Invalid Credentials!');
           }
     
       }
  
 
    }



    public function logout(Request $request)
    {
        //Session::flush();
        if( auth()->user()->user_type=='admin')
        {
            Auth::logout();
             return redirect(route('login'))->with('success', 'You have logged out!');
        
        }
        if( auth()->user()->user_type=='customer')
        {
            Auth::logout();
             return redirect(route('home'))->with('success', 'You have logged out!');
        
        }
        else
        {
         Auth::logout();
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
