<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DoctorModel;
use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;

use App\User; 
use App\Http\Requests;
use App\Doctorprofile;
use App\Doctorschedule;
use App\Speciality;
use App\Patient;
use App\DoctorReview;
use App\blogs;

use App\Scheduletime;
class DoctorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      $title = "All Doctor";
    $subtitle="allDoctor";
    $activePage = "Doctor";
    $user_type='doctor';
    $dCount=User::where('user_type',$user_type)->count();
    $doctors=User::where('user_type',$user_type)
       ->orderBy('id','DESC')
        ->sortable()->paginate(10);

      return view('admin.bdoctors.list',compact('title','doctors','activePage','subtitle','dCount'));
  }


  public function create()
  {
      $title = "Create New Doctor";
      $subtitle="Doctor";
      $activePage = "Doctor"; 
        return view('admin.bdoctors.add',compact('title','activePage','subtitle'));
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
         
          'user_type'=>'doctor'
        
      ];

      $result=User::create($data);
      return redirect(route('doctors.list'))->with('success', 'Doctor Successfully Added!');
  }
  

 
  public function edit(Request $request, $id)
  {
    $title = "Update Doctor";
    $subtitle="allDoctor";
    $activePage = "Doctor";
    $email=auth()->user()->email;
    $user_type='doctor';
   
    
    $user=User::where('id',$id)->where('user_type',$user_type)->first();
      return view('admin.bdoctors.edit',compact('title','user','subtitle','activePage'));
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

    $title = "Update Doctor";
    $subtitle="allDoctor";
    $activePage = "Doctor";

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
return redirect()->back()->with('success','Doctor Profile Successfully Updated!');
  }
  
  public function saveGeneralProfile(Request $request, $id)
  {

  

  $this->validate(request(), [
     
      'gender'=>'required',
      'dbd'=>'required',
     
   
  ]);

  $data=[
      'gender' => $request->gender,
      'dbd' => $request->dbd,
 
      'updated_at'=>date('Y-m-d H:i:s')
  
    
  ];

  $result=User::where('id',$id)->update($data);
 
  return redirect()->back()->with('success', 'General Information Successfully Updated!');
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
    $title = "View Doctor";
    $subtitle="View Doctor";
    $activePage = "Doctor";
    $email=auth()->user()->email;
    $user_type='doctor';
   
    
    $user=User::where('id',$id)->where('user_type',$user_type)->first();
      return view('admin.bdoctors.view',compact('title','user','subtitle','activePage'));
  }
  
  public function destroy(Request $request)
  {
    $id=$request->id; 
      
        $delete = User::where('id', $id)->delete();
        if ($delete){
    
              return ['success' => 1, 'Doctor Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
  }







    public function fav_doctor(){

              $activePage = "Doctor";

            $data = DoctorModel::all();

      return view('admin.doctor.favouritedoctor')->with(compact('data','activePage'));
    }



public function prescriptions(){
                $activePage = "Doctor";
                //echo"ok";exit();

  return view('admin.doctor.prescriptions')->with(compact('activePage'));
}


    public function prescriptionsstore(Request $request)
    {

      $date = date("Y-m-d H:i:s");
     
      $user_name = Auth::user()->name;
      
        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file')->move('public/uploads/doctors', $imageName);
        }

       

$data = array('prescription'=>$request->input('about'),
'user_id'=>$request->input('userid'),
'doctor'=>$user_name,
'attachment'=>$imageName,
'date'=>$date

);
DB::table('prescription')->insert($data);

  
         return response()->json('Image uploaded successfully');
    }








public function medicalrecords(){
                $activePage = "Doctor";

  return view('admin.doctor.medicalrecords')->with(compact('activePage'));
}



  public function addmedicalrecords(Request $request)
    {
       /*$request->validate([
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,txt,docs,pdf,csv|max:2048',
        ]);*/

      $date = date("Y-m-d H:i:s");
     
      $user_name = Auth::user()->name;



         if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('file')->move('public/uploads/doctors', $imageName);
        }

       

$data = array('description'=>$request->input('about'),
'user_id'=>$request->input('userid'),
'doctor'=>$user_name,
'date'=>$date,
'attachment'=>$imageName

);
DB::table('medical_record')->insert($data);

       
        return response()->json('Image uploaded successfully');
    }






public function doctor_like(Request $request){
    
$id = $request->input('id');
$date = date("Y-m-d H:i:s");

     $data = array( 'likes' =>  DB::raw('likes+1'),
                    
                
                    'updated_at'=> $date
                    
                );

DB::table('doctorprofiles')->where('id',$id)->update($data);
$data = DB::table('doctorprofiles')->where('id',$id)->get('likes');
$con = '';
foreach($data as $row){
$con .= $row->likes;
}

return $con;
}

public function doctor_dislike(Request $request){
    
$id = $request->input('id');
$date = date("Y-m-d H:i:s");

     $data = array( 'dislikes' =>  DB::raw('dislikes+1'),
                    
                
                    'updated_at'=> $date
                    
                );

DB::table('doctorprofiles')->where('id',$id)->update($data);
$data = DB::table('doctorprofiles')->where('id',$id)->get('dislikes');
$con = '';
foreach($data as $row){
$con .= $row->dislikes;
}

return $con;
}


public function doctorbooking($id){

  $schedule = DB::table('doctorschedules')->where('doctorId',$id)->groupBy('weekday')->get();
  $doctor = DB::table('doctorprofiles')->where('userid',$id)->get();
return view('home.booking')->with(compact('doctor','schedule'));

}

public function doctorbookings($id){
  $schedule = Scheduletime::where('user_id',$id)->get();
    $sunday = Scheduletime::where('user_id',$id)->where('weekday','sunday')->get();
   $monday = Scheduletime::where('user_id',$id)->where('weekday','monday')->get();
      $tuesday = Scheduletime::where('user_id',$id)->where('weekday','tuesday')->get();
         $wednesday = Scheduletime::where('user_id',$id)->where('weekday','wednesday')->get();
            $thursday = Scheduletime::where('user_id',$id)->where('weekday','thursday')->get();
               $friday = Scheduletime::where('user_id',$id)->where('weekday','friday')->get();
                  $saturday = Scheduletime::where('user_id',$id)->where('weekday','saturday')->get();
  $doctor = DB::table('users')->where('id',$id)->get();
 
return view('home.bookings')->with(compact('doctor','schedule','monday','sunday','tuesday','wednesday','thursday','friday','saturday'));

}



public function scheduletimes_dayfront(Request $request){
    
$day = $request->input('appointment_date');
$id = $request->input('doctorid');

    
         $ds=strtolower(date('l', strtotime($day)));

    $data=DB::table('scheduletimes')->where([
     
       'weekday' => $ds,
       'user_id' => $id,
       
])->get();


$content ='<div class="container">
                    <div class="row">';

if(count($data)){
foreach($data  as $looped_value){
    
$content .=' <div class="col-md-3">
                        
<div class="doc-slot-list">
<input type="radio" id="time" name="time" value="'.$looped_value->start_time.'-'.$looped_value->end_time.'"> '.$looped_value->start_time.'-'.$looped_value->end_time.'<input type="hidden" name="days" id="days" value="'.$looped_value->weekday.'">
                                <input type="hidden" name="adate" id="adate" value="'.$day.'"></div></div>';
         

        

}
$content.='</div></div>';
}else{
  $content .='Time slot not available.';

}

$dds=$content;



    
      return $dds;
  
  

}



public function booktime(Request $request){
  
$redio=$request->input('time');
$day = $request->input('days');
$name=$request->input('name');
$phone=$request->input('phone');
$date=$request->input('adate');
$email=$request->input('email');
//$m=$request->input('m');
$m=0;
$user_type = Auth::user()->user_type;
    $user_id = Auth::user()->id;
    $dates = $request->input('adate');
    $ds=date('d-m-Y', strtotime($dates));

$data = array('doctorId'=>$request->input('doctorId'),
  'doctorId'=>$request->input('doctorId'),
  'user_type'=>$user_type,
  'patientId'=>$user_id,
  'name'=>$request->input('name'),
  'email'=>$request->input('email'),
  'phone'=>$request->input('phone'),
  'date'=>$request->input('adate'),
  'day'=>$day,
  'time'=>$redio,
  'purpose'=>$m,
  'fees'=>$request->input('price'),
  'address'=>$request->input('address'),
   'comment'=>$request->input('comment'),

);
DB::table('book_appoint')->insert($data);



$content = '';

$content .='<input type="hidden" name="phone"value="'.$phone.'">
<input type="hidden" name="name"value="'.$name.'">
<input type="hidden" name="appointment_date"value="'.$date.'">
<input type="hidden" name="time"value="'.$redio.'">
<input type="hidden" name="email"value="'.$email.'">
<ul class="booking-date">
                                            <li>Date <span>'.$ds.'</span></li>
                                            <li>Time <span>'.$redio.'</span></li>
                                        </ul>'

                                        ;

return $content;

}

/*--------------------home search-------------------------*/
public function homesearch(){
  return view('home.homesearch');
}




public function homesearchloc(Request $request){
  $search = $request->input('keyword');
  //$search = '';

$output = '';

$data = User::where('city', 'LIKE', $search.'%')->distinct()->get(['city']);


  $output = '<ul id="country-list" style="width:100%!important;position:absolute;
    top:48px;
    z-index:99;margin-top:0px!important;">';
    
  foreach($data as $row){
       $output .= '<li onClick="selectCountry(\''. $row->city . '\');" value='.$row->city.'>'.$row->city.'</li>';

  }
 $output .= '</ul>';
      

 return $output;

}



public function hospitalname(Request $request){
  $search = $request->input('keywords');
  $key = $request->input('key');

  //$search = 'd';
   //$key = 'd';
$output = '';

$data = User::where('user_type', 'LIKE', $search.'%')->where('city',$key)->get();


  $output = '<ul id="country-list"  style="width:100%!important; position:absolute;
    top:48px;
    z-index:99; margin-top:0px!important;">';
    
  foreach($data as $row){
       $output .= '<li onClick="selectCountrys(\''. $row->user_type . '\');" value='.$row->user_type.'>'.$row->user_type.'</li>';

  }
 $output .= '</ul>';
      

 return $output;

}



public function homespeciality(Request $request){
  $search = $request->input('keywords');
  $key = $request->input('key');
  $hospital = $request->input('spe');

  //$search = 'd';
   //$key = 'd';
$output = '';

$data = User::where('specialization', 'LIKE', $search.'%')->where('city',$key)->where('user_type',$hospital)->get();


  $output = '<ul id="country-list"  style="width:100%!important; position:absolute;
    top:48px;
    z-index:99;margin-top:0px!important;">';
    
  foreach($data as $row){
       $output .= '<li onClick="selectCountryss(\''. $row->specialization . '\');" value='.$row->specialization.'>'.$row->specialization.'</li>';

  }
 $output .= '</ul>';
      

 return $output;

}


public function searchdocs(Request $request){
  $city = $request->input('city');
  $name = $request->input('doname');
  $spe = $request->input('specialist');
  if($city==''||$name==''||$spe==''){
    return back();
  }else{
$datas = Doctorprofile::where([
     'city' => $city,
     'name' => $name,  
     'specialist' => $spe,   
])->get('userid');
if($datas->count()){

foreach($datas as $row){
$id = $row->userid;

}


$getr = DB::table('doctor_reviews')->select('doctor_reviews.doctorId','point','title','review','name')
  ->join('users', 'users.id', '=', 'doctor_reviews.patientId')
  ->get();


          $speciality=Speciality::get();
          $schedule = Doctorschedule::get();
          $doctor = Doctorprofile::where('id',$id)->first();
         $patientdetails = Patient::where(['id'=>$id])->first();
         $review = DoctorReview::get();
      return view('socialvaidya.doctor-profile')->with(compact('doctor','schedule','speciality','patientdetails','review','getr'));
   
  }
  else{
  $dd="Sorry! No Data found!";
    return back()->with('suc',$dd); 


  }

}
}/*--------------------home search end-------------------------*/



}
