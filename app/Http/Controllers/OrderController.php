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
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
  
    public function index()
    {
        $title = "All Orders";
      $subtitle="Orders";
      $activePage = "Orders";
      $oCount=Order::distinct('order_no')->where('payment','1')->groupBy('order_no')->count();
      $orders=Order::select('*')
          
            ->where('payment','1')
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function myorder()
    {
        $title = "All My Orders";
      $subtitle="Orders";
      $activePage = "Orders";
      $oCount=Order::where('seller_id',auth()->user()->id)->where('payment','1')->count();
      $orders=Order::select('*')
      ->where('seller_id',auth()->user()->id)
            ->where('payment','1')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.orders.seller_list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function myorderHis()
    {
        $title = "My Orders History";
      $subtitle="Orders";
      $activePage = "Orders";
      $oCount=Order::where('user_id',auth()->user()->id)->where('payment','1')->count();
      $orders=Order::select('*')
      ->where('user_id',auth()->user()->id)
            ->where('payment','1')
         ->orderBy('id','DESC')
        
         ->sortable()->paginate(30);
        return view('admin.orders.orderhis_list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function new()
    {
        $title = "New Orders";
      $subtitle="NewOrders";
      $activePage = "Orders";
      $status='new';
      $oCount=Order::distinct('order_no') ->where('payment','1') ->where('status',$status)->count();
      $orders=Order::select('*')
               ->where('payment','1')
            ->where('status',$status)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function processing()
    {
        $title = "Processing Orders";
      $subtitle="ProcessingOrders";
      $activePage = "Orders";
      $status='processing';
      $oCount=Order::distinct('order_no') ->where('payment','1')->where('status',$status)->count();
      $orders=Order::select('*')
             ->where('payment','1')
            ->where('status',$status)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function completed()
    {
        $title = "Completed Orders";
      $subtitle="CompletedOrders";
      $activePage = "Orders";
      $status='completed';
      $oCount=Order::distinct('order_no')->where('payment','1')->where('status',$status)->count();
      $orders=Order::select('*')
          ->where('payment','1')
            ->where('status',$status)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function cancelled()
    {
        $title = "Cancelled Orders";
      $subtitle="CancelledOrders";
      $activePage = "Orders";
      $status='cancelled';
      $oCount=Order::distinct('order_no')->where('payment','1') ->where('status',$status)->count();
      $orders=Order::select('*')
         ->where('payment','1')
            ->where('status',$status)
         ->orderBy('id','DESC')
         ->groupBy('order_no')
         ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function view(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
      $subtitle="Orders";
      $activePage = "Orders";
   
      $oCount=Order::where('payment','1')->where('order_no',$order_no)->count();
      $orders=Order::select('*')
       ->where('payment','1')
            ->where('order_no',$order_no)
            ->get();
        return view('admin.orders.view',compact('title','orders','activePage','subtitle','oCount','order_no'));
    }

    public function print(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
      $subtitle="Orders";
      $activePage = "Orders";
   
      $oCount=Order::distinct('order_no')->where('payment','1')->where('order_no',$order_no)->count();
      $orders=Order::select('*')
         ->where('payment','1')
            ->where('order_no',$order_no)
            ->get();
        return view('admin.orders.print',compact('title','orders','activePage','subtitle','oCount','order_no'));
    }

    public function sellerview(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
      $subtitle="Orders";
      $activePage = "Orders";
   
      $oCount=Order::where('payment','1')->where('order_no',$order_no)->count();
      $orders=Order::select('*')
      ->where('seller_id',auth()->user()->id)
          ->where('payment','1')
            ->where('order_no',$order_no)
            ->groupBy('order_no')
            ->get();
        return view('admin.orders.seller_view',compact('title','orders','activePage','subtitle','oCount','order_no'));
    }

    public function sellerprint(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
      $subtitle="Orders";
      $activePage = "Orders";
   
      $oCount=Order::distinct('order_no')->where('payment','1')  ->where('order_no',$order_no)->count();
      $orders=Order::select('*')
      ->where('seller_id',auth()->user()->id)
         ->where('payment','1')
            ->where('order_no',$order_no)
            ->groupBy('order_no')
           
            ->get();
        return view('admin.orders.seller_print',compact('title','orders','activePage','subtitle','oCount','order_no'));
    }
    

    
     
    public function statusUpdate(Request $request)
    {
        $order_no=$request->order_no; 
        $data['status']=$request->status; 
        $res=Order::where('order_no',$order_no)->update($data);
       
        if ($res){
    
         
              return ['success' => 1, 'Status Successfully Updated!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }

    
    public function paymentUpdate(Request $request)
    {
        $order_no=$request->order_no; 
        $data['payment']=$request->payment; 
        $res=Order::where('order_no',$order_no)->update($data);
       
        if ($res){
    
         
              return ['success' => 1, 'Payment Successfully Updated!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }     
    }



}

