<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheduletime;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;
use App\User; 
use App\Http\Requests;
class ScheduletimeController extends Controller
{
    public function scheduletime(){
        $activePage = "Schedule Time";


        return view('admin.schedule.schedule-timings')->with(compact('activePage'));
    }
    

public function scheduletimes_day(Request $request){
    $user_type = Auth::user()->user_type;
    $user_id = Auth::user()->id;
$day = $request->input('weekday');


    $data=DB::table('scheduletimes')->where([
       'weekday' => $day,
       'user_type' => $user_type,
       'user_id' => $user_id,
       
])->get();

$datacount=DB::table('scheduletimes')->where([
       'weekday' => $day,
       'user_type' => $user_type,
       'user_id' => $user_id,
       
])->count();
$content ='';
if($datacount){
foreach($data  as $looped_value){
    if($looped_value->start_time!=''||$looped_value->end_time!=''){
$c ='<a class="edit-link" data-toggle="modal" href="#edit_time_slot"></a>'; 

    }
   
$content .='<div class="doc-slot-list"> '.$looped_value->start_time.'-'.$looped_value->end_time.'<a href="#" class="delete_schedule" onclick="return change_statussd('.$looped_value->id.');" id="status_sunnday">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </div>';

}
$dds=$content.$c;
}else{
    
 $content .='<div class="doc-slot-list">No Data</div>';   
 $dds=$content;   
}

      return $dds;

}

public function deletescheduletimes(Request $request){
    $id=$request->input('id');
    
DB::table('scheduletimes')->where('id',$id)->delete();
 return 1;   
}

    public function addscheduletime(Request $request){
        
        $dates=$request->adate;
         $ds=strtolower(date('l', strtotime($dates)));

        $data=[
            'adate'=>$dates,
            'weekday' => $request->weekday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_type' => auth()->user()->user_type,
            'user_id' => auth()->user()->id
        ];
    
        $result=Scheduletime::create($data);
        return redirect()->back()->with('success','Timeslot Added Successfully..!');
    
    }


    public function edit(Request $request){

        $this->validate(request(), [
            'weekday' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        
        ]);
    
    
        $data=[
            'weekday' => $request->weekday,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'user_type' => auth()->user()->user_type,
            'user_id' => auth()->user()->id
        ];
        Scheduletime::where('id',1)->update($data);
return 1;

    }
    
}