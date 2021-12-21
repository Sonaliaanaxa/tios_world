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

use App\Http\Requests;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
  
    public function index()
    {
        $title = "All Payments";
      $subtitle="Payments";
      $activePage = "Payments";
      $oCount=Order::distinct('order_no')->where('order','1')->count();
      $pCompleted=Order::where('order','1')->where('payment','1')->sum('total_price');
      $pPending=Order::where('order','1')->where('payment','0')->sum('total_price');
      $pAll=Order::where('order','1')->sum('total_price');
      $payments=Order::select('*')
            ->where('order','1')
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.payments.list',compact('title','payments','activePage','subtitle','oCount','pCompleted','pPending','pAll'));
    }
    
    public function myorder()
    {
        $title = "All My Orders";
      $subtitle="Orders";
      $activePage = "Orders";
      $oCount=Order::where('seller_id',auth()->user()->id)->where('order','1')->count();
      $orders=Order::select('*')
      ->where('seller_id',auth()->user()->id)
            ->where('order','1')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.orders.seller_list',compact('title','orders','activePage','subtitle','oCount'));
    }
    
    public function myPayment()
    {
        $title = "All Payments";
      $subtitle="Payments";
      $activePage = "Payments";
      $oCount=Order::distinct('order_no')->where('seller_id',auth()->user()->id)->where('order','1')->count();
    
      $payments=Order::select('*')
      ->where('seller_id',auth()->user()->id)
            ->where('order','1')
         ->orderBy('id','DESC')
  
         ->sortable()->paginate(30);
        return view('admin.payments.seller_list',compact('title','payments','activePage','subtitle','oCount'));
    }
    

    public function new()
    {
        $title = "New Payments";
      $subtitle="newPayments";
      $activePage = "Payments";
      $status='new';

      $pCompleted=Order::where('order','1')->where('status',$status)->where('payment','1')->sum('total_price');
      $pPending=Order::where('order','1')->where('status',$status)->where('payment','0')->sum('total_price');
      $pAll=Order::where('order','1')->where('status',$status)->sum('total_price');
     
      $oCount=Order::distinct('order_no')->where('order','1')  ->where('status',$status)->count();
      $payments=Order::select('*')
            ->where('order','1')
            ->where('status',$status)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.payments.list',compact('title','payments','activePage','subtitle','oCount','pCompleted','pPending','pAll'));
    }
 
    public function month()
    {
        $title = "Current Month Payments";
      $subtitle="monthPayments";
      $activePage = "Payments";
      $month=date('F');
      $year=date('Y');

      $pCompleted=Order::where('order','1')->where('payment','1')->where('month',$month)->where('year',$year)->sum('total_price');
      $pPending=Order::where('order','1')->where('payment','0')->where('month',$month)->where('year',$year)->sum('total_price');
      $pAll=Order::where('order','1')->where('month',$month)->where('year',$year)->sum('total_price');

 
      $oCount=Order::distinct('order_no')->where('order','1')->where('month',$month)->where('year',$year)->count();
      $payments=Order::select('*')
            ->where('order','1')
            ->where('month',$month)
            ->where('year',$year)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.payments.list',compact('title','payments','activePage','subtitle','oCount','pCompleted','pPending','pAll'));
    }


    public function year()
    {
        $title = "1 Year Payments";
      $subtitle="yearPayments";
      $activePage = "Payments";
      $year=date('Y');

      $pCompleted=Order::where('order','1')->where('payment','1')->where('year',$year)->sum('total_price');
      $pPending=Order::where('order','1')->where('payment','0')->where('year',$year)->sum('total_price');
      $pAll=Order::where('order','1')->where('year',$year)->sum('total_price');
      $oCount=Order::distinct('order_no')->where('order','1')  ->where('year',$year)->count();
      $payments=Order::select('*')
            ->where('order','1')
            ->where('year',$year)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.payments.list',compact('title','payments','activePage','subtitle','oCount','pCompleted','pPending','pAll'));
    }

 
    public function print(Request $request)
    {
        $title = "All Payments";
        $subtitle="Payments";
        $activePage = "Payments";
        $pCompleted=Order::where('order','1')->where('payment','1')->sum('total_price');
        $pPending=Order::where('order','1')->where('payment','0')->sum('total_price');
        $pAll=Order::where('order','1')->sum('total_price');
     
      
        $payments=Order::select('*')
              ->where('order','1')
           ->orderBy('id','DESC')
           ->groupBy('order_no')
           ->sortable()->paginate(30);
          return view('admin.payments.print',compact('title','payments','activePage','subtitle','pCompleted','pPending','pAll'));
    }
    
//--------------------------------------Payment Plans----------------------------------------------------------//

public function paymentPlans()
{
    $title = "Payments Plans";
  $subtitle="Payments Plans";
  $activePage = "Payments";

    return view('admin.payments.paymentPlan',compact('title','activePage','subtitle'));
}



public function paymentSuccess()
{
    $title = "Payments Success";
  $subtitle="Payments Success";
  $activePage = "Payments";

    return view('admin.payments.paymentSuccess',compact('title','activePage','subtitle'));
}

public function paymentPlanDetails(Request $request,$id)
{
    $title = "Payments Plans";
  $subtitle="Payments Plans";
  $activePage = "Payments";

    return view('admin.payments.plan-details',compact('title','activePage','subtitle','id'));
} 
    
     


}

