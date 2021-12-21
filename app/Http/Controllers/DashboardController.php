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
use App\Category;
use App\Subcategory; 
use App\Product;
use App\City;
use App\Order;
use App\Message;
use App\SubscriptionPlan;
use App\SubscriptionPayment;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class DashboardController extends Controller
{
 
  public function __construct()
  {
  
      $this->middleware('auth');
     
      
  }
 
    public function admin()
    {
     
      
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');

        return view('admin.dashboard.admin',compact('title','activePage','subtitle'));
    
    }
    public function doctor()
    {
     
      
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
      $user_id = Auth::user()->id;
      $data = DB::table('book_appoint')->where('doctorId',$user_id)->count();

      $subscription=SubscriptionPayment::where('u_id',$user_id)
                                ->where('payment_status','completed')
                                ->where('status','active')->orderBy('id', 'desc')
                                ->first();

        return view('admin.dashboard.doctor',compact('title','activePage','subtitle','data','subscription'));
    
    }
    public function blood_bank()
    {
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
   
      
        return view('admin.dashboard.blood_bank',compact('title','activePage','subtitle'));
    
    }
    public function diagonostics()
    {
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
   
            $user_id = Auth::user()->id;
      $data = DB::table('book_appoint')->where('doctorId',$user_id)->count();

        return view('admin.dashboard.diagonostics',compact('title','activePage','subtitle','data'));
    
    }
    public function hospital()
    {
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
   
            $user_id = Auth::user()->id;
      $data = DB::table('book_appoint')->where('doctorId',$user_id)->count();

        return view('admin.dashboard.hospital',compact('title','activePage','subtitle','data'));
    
    }
    public function pharmacy()
    {
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
   
      
        return view('admin.dashboard.pharmacy',compact('title','activePage','subtitle'));
    
    }

    public function patient()
    {
      $title = "Dashboard";
      $subtitle="users_list";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');
   
                  $user_id = Auth::user()->id;
      $data = DB::table('book_appoint')->where('patientId',$user_id)->count();

        return view('admin.dashboard.patient',compact('title','activePage','subtitle','data'));
    
    }
   
  
  
}
