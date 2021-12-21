<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

use App\Order;
use App\OrderDetail;

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
      $oCount=Order::count();
      $orders=Order::select('orders.*','users.name as uname')
        ->join('users','users.id','orders.user_id')
        ->orderBy('orders.id','DESC')
        ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    
    
    public function pending()
    {
        $title = "Pending Orders";
      $subtitle="Pending";
      $activePage = "PendingOrders";
      $status='pending';
      $oCount=Order::where('payment',$status)->count();
      $orders=Order::select('orders.*','users.name as uname')
      ->join('users','users.id','orders.user_id')
      ->where('orders.payment',$status)
      ->orderBy('orders.id','DESC')
      ->sortable()->paginate(30);
     
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function shipped()
    {
        $title = "Shipped Orders";
      $subtitle="ShippedOrders";
      $activePage = "Orders";
      $status='shipped';
      $oCount=Order::where('payment',$status)->count();
      $orders=Order::select('orders.*','users.name as uname')
                        ->join('users','users.id','orders.user_id')
                        ->where('orders.payment',$status)
                        ->orderBy('orders.id','DESC')
                        ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function delivered()
    {
        $title = "Delivered Orders";
      $subtitle="DeliveredOrders";
      $activePage = "Orders";
      $status='delivered';
      $oCount=Order::where('payment',$status)->count();
      $orders=Order::select('orders.*','users.name as uname')
                    ->join('users','users.id','orders.user_id')
                    ->where('orders.payment',$status)
                    ->orderBy('orders.id','DESC')
                    ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }
    public function cancelled()
    {
        $title = "Cancelled Orders";
      $subtitle="CancelledOrders";
      $activePage = "Orders";
      $status='cancelled';
      $oCount=OrderDetail::where('delivery_status',$status)->count();
      $orders = Order::select('orders.*','order_details.product_id','products.currency as currency','products.name as product_name','order_details.delivery_status as delivery_status')
                    ->join('users','users.id','orders.id')
                    ->join('order_details','order_details.order_id','orders.id')
                    ->join('products','products.id','order_details.product_id')
                    ->where('orders.payment',$status)
                    ->orderBy('id','DESC')
                    ->sortable()->paginate(30);
        return view('admin.orders.list',compact('title','orders','activePage','subtitle','oCount'));
    }

    public function view(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
        $subtitle="Orders";
        $activePage = "Orders";   
   
      $oCount=Order::select('*')
      ->where('order_no',$order_no)->count();
      $orders=Order::select('*','products.name as product_name','products.upload_image as img','products.price as product_price','products.mrp as product_mrp','users.name as uname')
                    ->join('users','users.id','orders.user_id')
                    ->join('order_details','order_details.order_id','orders.id')
                    ->join('products','products.id','order_details.product_id')
                    ->where('order_no',$order_no)
                    ->get();
        // dd($orders);
        return view('admin.orders.view',compact('title','orders','activePage','subtitle','oCount','order_no'));
    }

    public function print(Request $request, $id)
    {
        $order_no=$id;
        $title = "View Order Details";
      $subtitle="Orders";
      $activePage = "Orders";
     
      $oCount=Order::where('order_no',$order_no)->count();
      $orders=Order::select('*','products.name as product_name','products.upload_image as img','products.price as product_price','products.mrp as product_mrp','users.name as uname')
                    ->join('users','users.id','orders.user_id')
                    ->join('order_details','order_details.order_id','orders.id')
                    ->join('products','products.id','order_details.product_id')
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
        $data['payment']=$request->status;

        $res=Order::where('order_no',$order_no)->update($data);
       
        if ($res){
    
              return response()->json(array('status'=>true,'message'=>'Status updated!'));
              
            }
            else
                {
                    return response()->json(array('status'=>false,'message'=>'Sorry Error!'));
             
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

