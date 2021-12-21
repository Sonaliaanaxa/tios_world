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
/*----------shailendra------------*/
use App\Doctorschedule;
use App\Doctorprofile;
use App\Speciality;
use App\Patient;
use App\DoctorReview;
use Illuminate\Support\Facades\DB;
use App\DoctorModel;
use App\blogs;


/*----------------shailendra end-------------------*/


use App\Http\Requests;

class AllUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



  public function bookingsave(Request $request){

    $date = $request->input('appointment_date');
  $nameOfDay = date('l', strtotime($date));
  $day = $nameOfDay;
  
  
    if($request->input('timeslot')){
        $time = $request->input('timeslot');
    }else{
       $time = ''; 
    }
  
      $data = array( 'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'name' => $request->input('name'),
                    'address' => $request->input('address'),
                    'doctorId'=>$request->input('doctorId'),
                    'date'=>$request->input('appointment_date'),
                    'day'=> $day,
                    'time'=> $time,
                    'fees'=>'120'
                );
  
      DB::table('book_appoint')->insert($data);
      $dd='<div class="booking-summary">
                                    <div class="booking-item-wrap">
                                        <ul class="booking-date">
                                            <li>Date <span>'. $request->input("appointment_date").'</span></li>
                                            <li>Time <span> '. $request->input("timeslot").'</span></li>
                                        </ul>
                                        <ul class="booking-fee">
                                            <li>Consulting Fee <span>₹&nbsp;150</span></li>
                                            <li>Booking Fee <span>₹&nbsp;10</span></li>
                                        </ul>
                                        <div class="booking-total">
                                            <ul class="booking-total-list">
                                                <li>
                                                    <span>Total</span>
                                                    <span class="total-cost">₹&nbsp;160</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>';
  
  
  
      return $dd;
  }


  public function savereviews(Request $request){
    $emails = Session::get('email');
  /*$pat = DB::table('patients')->where('email',$emails)->get();
  foreach($pat as $p){
   $patientId = $p['id'];
  
  }
  if($patientId==''){*/
   $pat = DB::table('users')->where('email',$emails)->get();
  foreach($pat as $p){
   $patientId = $p->id;
  
  } 
  //}
  $date = date("Y-m-d H:i:s");
  
     $data = array( 'point' => $request->input('rating'),
                    'title' => $request->input('title'),
                    'review' => $request->input('review'),
                    'doctorId' => $request->input('doctorId'),
                    'patientId' => $patientId,
                    'created_at' => $date,
                    'updated_at'=> $date
                    
                );
  DB::table('doctor_reviews')->insert($data);
  return back()->with('success',True);
  }
  
  
  public function comments(Request $request){
    /*echo"ok";
    exit();*/
    $date = date("Y-m-d H:i:s");
  if(Session::has('email')){
  $emails = Session::get('email');
  $da=DB::table('users')->where('email',$emails)->get('id');
  
  foreach($da as $row){
  $id = $row->id;
  
  }
     $data = array( 'reply' => $request->input('comment'),
                    'typeId' => 'review',
                    'userId'=> $id,
                    'commentId'=>$request->input('commentid'),
                    'status'=>1,
                    'created_at' => $date,
                    'updated_at' => $date   
                );
  
  
  DB::table('replys')->insert($data);
  return 1;
  }
  else{
  return 0;
  }
  
  }

/*----------------------apointment listing start--------------------------------*/

public function appointlisting(){
    $activePage = "Appointments";

              
$user_type = Auth::user()->user_type;
$user_id = Auth::user()->id;
                

   $post = DB::table('book_appoint')
->select('book_appoint.*')  
->where([
   'book_appoint.doctorId' => $user_id,
   'book_appoint.user_type' => $user_type,   
])
->orderBy('book_appoint.id','DESC')
->join('users', 'users.id', '=', 'book_appoint.doctorId')

->get();


return view('appointments')->with(compact('post','activePage'));
}




/*----------------------apointment listing end--------------------------------*/

/*----------------------------hospital start-------------------------------------*/

public function patientappoint(){
    $activePage = "Appointments";


$user_type = Auth::user()->user_type;
$user_id = Auth::user()->id;
if($user_type=='admin'){
$docs = DB::table('subscription_payments')->get();
  $post = DB::table('book_appoint')
->select('book_appoint.*')
->orderBy('book_appoint.id','DESC')
->join('users', 'users.id', '=', 'book_appoint.doctorId')

->get();

}else{

     $docs = DB::table('subscription_payments')->where('u_id',$user_id)->get();

 $post = DB::table('book_appoint')
->select('*')
->where([
   'doctorId' => $user_id,
 /*  'user_type' => $user_type, */  
])
->orderBy('id','DESC')
//->join('users', 'users.id', '=', 'book_appoint.doctorId')

->get();
    }
//$post = DB::table('book_appoint')->where('doctorId',$user_id)->get();

//print_r($post.'<br><br>');
//print_r($docs);die;
return view('admin.hospital.hospital-dashboard')->with(compact('post','docs','activePage'));
}

public function patientappointcancel($id){

DB::table('book_appoint')->where('id',$id)->delete();

return back()->with('success',True);
}

public function patientappointactive($id){
   // echo $id;exit();

$data=DB::table('book_appoint')->where('id',$id)->get('status');
foreach($data as $row){

$st=$row->status;

}

if($st==0){
    DB::table('book_appoint')->where('id',$id)->update(array('status'=>1));
}
elseif($st==1){
DB::table('book_appoint')->where('id',$id)->update(array('status'=>0));
}


return back()->with('succ',True);
}


public function apointment_view(Request $request){

$id = $request->input('id');
$data = DB::table('book_appoint')->where('id',$id)->get();




$content ='';
foreach($data  as $row){
if($row->status==1){
$c = 'Completed';
}else{
$c = 'Pending';
}

 if($row->purpose==1){
        $p = 'Paid';
    }else{
        $p = 'Unpaid';
    }

$content .='<ul class="info-details">
                    <li>
                        <div class="details-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="title">#APT0001</span>
                                    <span class="text">'.$row->date.'</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn bg-success-light btn-sm" id="topup_status">'.$c.'</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="title">Status:</span>
                        <span class="text">'.$c.'</span>
                    </li>
                    <li>
                        <span class="title">Confirm Date:</span>
                        <span class="text">'.$row->date.'</span>
                    </li>
                    <li>
                        <span class="title">'.$p.' Amount</span>
                        <span class="text">₹'.$row->fees.'</span>
                    </li>
                        <li>
                        <span class="title">Comment</span>
                        <span class="text">'.$row->comment.'</span>
                    </li>
                </ul>';

}






  return $content;


}




public function hospitalreviews(){
      $activePage = 'Reviews';


   $replay = DB::table('replys')
 ->select('reply','name','commentId')
->join('users', 'users.id', '=', 'replys.userId')
  ->join('doctor_reviews', 'doctor_reviews.id','=','replys.commentId')
 /*->join('doctor_reviews', 'doctor_reviews.patientId','=','users.id')*/

->get();


    $getr = DB::table('doctor_reviews')
->select('doctor_reviews.id','point','title','review','likes','name')
->orderBy('doctor_reviews.id','DESC')
->join('users', 'users.id', '=', 'doctor_reviews.patientId')

->get();
//return view('hospital.hospital-reviews')->with('post',$getr);
return view('admin.hospital.hospital-reviews')->with(compact('getr','replay','activePage'));
}

public function hospitalreviews_like(Request $request){

$id = $request->input('id');
$date = date("Y-m-d H:i:s");

 $data = array( 'likes' =>  $request->input('like'),
                
                'created_at' => $date,
                'updated_at'=> $date
                
            );

DB::table('doctor_reviews')->where('id',$id)->update($data);
return 1;
}


public function viewReview(){
    $activePage = "Reviews";
       $replay = DB::table('replys')
     ->select('reply','name','commentId')
    ->join('users', 'users.id', '=', 'replys.userId')
      ->join('doctor_reviews', 'doctor_reviews.id','=','replys.commentId')
   
    ->get();
  
    
        $getr = DB::table('doctor_reviews')
    ->select('doctor_reviews.id','doctor_reviews.doctorId','point','title','review','likes','name')
  ->orderBy('doctor_reviews.id','DESC')
    ->join('users', 'users.id', '=', 'doctor_reviews.patientId')
  
    ->get();


    
  
  
    return view('admin.review.reviews')->with(compact('activePage','getr','replay',));
  }
  /*----------------------------hospital end-------------------------------------*/  
}
