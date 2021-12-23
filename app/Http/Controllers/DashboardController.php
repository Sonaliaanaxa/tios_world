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

    public function seller()
    { 
      $title = "Dashboard";
      $subtitle="Dashboard";
      $activePage = "Dashboard";
      $month=date('F');
      $year=date('Y');

        return view('admin.dashboard.seller',compact('title','activePage','subtitle'));
    
    }
  
  
}
