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

use App\BloodbankRequest;

class BloodbankRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexRequest()
    {
        $title = "All Blood Bank Request";
      $subtitle="All Blood Bank Request";
      $activePage = "BloodBank";
      $oCount=BloodbankRequest::distinct('order_no') ->where('user_type','request')->count();
      $orders=BloodbankRequest::select('*')
            ->where('user_type','request')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.bloodbankrequest.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function indexDonate()
    {
        $title = "All Blood Bank Donate";
      $subtitle="All Blood Bank Donate";
      $activePage = "BloodBank";
      $oCount=BloodbankRequest::distinct('order_no')->where('user_type','donate')->count();
      $orders=BloodbankRequest::select('*')
            ->where('user_type','donate')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.bloodbankrequest.list',compact('title','orders','activePage','subtitle','oCount'));
    } 
  
    public function myRequest()
    {
        $title = "All Blood Bank Request";
      $subtitle="All Blood Bank Request";
      $activePage = "BloodBank";
      $oCount=BloodbankRequest::distinct('order_no') ->where('user_type','request')->where('bank_id',auth()->user()->id)->count();
      $orders=BloodbankRequest::select('*')
      ->where('bank_id',auth()->user()->id)
            ->where('user_type','request')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.bloodbankrequest.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function myDonate()
    {
        $title = "All Blood Bank Donate";
      $subtitle="All Blood Bank Donate";
      $activePage = "BloodBank";
      $oCount=BloodbankRequest::distinct('order_no')->where('user_type','donate')->where('bank_id',auth()->user()->id)->count();
      $orders=BloodbankRequest::select('*')
            ->where('user_type','donate')
            ->where('bank_id',auth()->user()->id)
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.bloodbankrequest.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function statusUpdate(Request $request)
    {
        $order_no=$request->order_no; 
        $data['status']=$request->status; 
        $res=BloodbankRequest::where('order_no',$order_no)->update($data);
       
        if ($res){
    
         
              return ['success' => 1, 'Status Successfully Updated!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }

    public function destroy(Request $request)
    {
      $id=$request->id; 
        
          $delete = BloodbankRequest::where('id', $id)->delete();
          if ($delete){
      
                return ['success' => 1, 'Blood Bank Successfully Deleted!'];
                
              }
              else
                  {
                      return ['success' => 0, 'Error Occured!'];
               
                  }
    }

}
