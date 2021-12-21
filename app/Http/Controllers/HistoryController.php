<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HistoryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
            public function appointmenthistory(){

        $activePage = "History";

$user_type = Auth::user()->user_type;
        //$data = HistoryModel::orderBy('id','DESC')->get();
$user_id = Auth::user()->id;

if($user_type=='admin'){
         $data = DB::table('book_appoint')
    ->select('book_appoint.*','users.img')
  
    ->join('users', 'users.id', '=', 'book_appoint.patientId')
->orderBy('book_appoint.id','DESC')
    ->get();



    $pre = DB::table('prescription')->orderBy('id','DESC')->get();

    $med = DB::table('medical_record')->orderBy('id','DESC')->get();


}else{

            $data = DB::table('book_appoint')
    ->select('book_appoint.*','users.img')
  
    ->join('users', 'users.id', '=', 'book_appoint.patientId')
 ->where('patientId',$user_id)
->orderBy('book_appoint.id','DESC')
    ->get();



    $pre = DB::table('prescription')->where('user_id',$user_id)->orderBy('id','DESC')->get();

    $med = DB::table('medical_record')->where('user_id',$user_id)->orderBy('id','DESC')->get();
 
}

    return view('admin.history.appointmenthistory')->with(compact('data','activePage','pre','med'));

    }



    public function historyget(Request $request){
        //$id = 6;
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
                                            <span class="title">#APT000'.$row->id.'</span>
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
                                <span class="text">'. date('d-m-Y', strtotime($row->date)).'</span>
                            </li>
                            <li>
                                <span class="title">Day:</span>
                                <span class="text"><span style="text-transform:uppercase;">'.$row->day.'</span></span>
                            </li>
                            <li>
                                <span class="title">Time:</span>
                                <span class="text">'.$row->time.'</span>
                            </li>
                            <li>
                                <span class="title">'.$p.' Amount:</span>
                                <span class="text">₹'.$row->fees.'</span>
                            </li>
                        </ul>';
    
    }
    
    
    
    
    
        
          return $content;
        }




    


    public function print($id){
        $activePage = "History";

$user_type = Auth::user()->user_type;
    //$data = HistoryModel::orderBy('id','DESC')->get();
$user_id = Auth::user()->id;

if($user_type=='admin'){
     $data = DB::table('book_appoint')
->select('book_appoint.*','users.img','users.name as name1','users.address as address1')
->where('book_appoint.id',$id)
->join('users', 'users.id', '=', 'book_appoint.doctorId')
->orderBy('book_appoint.id','DESC')
->get();




}else{

        $data = DB::table('book_appoint')   
->select('book_appoint.*','users.img','users.name as name1','users.address as address1')
->where('book_appoint.id',$id)
->join('users', 'users.id', '=', 'book_appoint.doctorId')
->where('book_appoint.patientId',$user_id)
->orderBy('book_appoint.id','DESC')
->get();





}

 return view('admin.history.invoice-view')->with(compact('data','activePage'));

}

}
