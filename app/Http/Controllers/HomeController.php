<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\AllSlider;
use App\HomeSlide;
use App\SideSlider;
use App\Product;
use App\HomePageBanner;
use App\Policy;
use App\ReturnRefund;
use App\Cart;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\DeliveryCharge;
use Razorpay\Api\Api;
use Exception;
use Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){
        $title = "Thehygieneherbs - Organic Food & Grocery Market Template";
        $slider = HomeSlide::where('status','1')->get();
        $sliders = SideSlider::skip(0)->take(2)->get();
        $second_sliders = SideSlider::skip(2)->take(1)->get();
        $products = Product::where('stock','1')->get();
        $banners = HomePageBanner::take(2)->get();
        
        return view('front.index', compact('title','slider','sliders','second_sliders','products','banners'));
    }

    public function header(){
        $carts = Cart::where('user_id', Auth::user())->get();
        return view('front.layouts.header', compact('carts'));
    }

    public function contact() {
        $title = "Thehygieneherbs - Contact";
        return view('front.contact', compact('title'));
    }

    public function about (){
        $title = "Thehygieneherbs - About";
        $slider = AllSlider::where('navbar_id','1')->where('status','1')->first();
        return view('front.about', compact('title','slider'));
    }

    public function terms(){
        $title = "Thehygieneherbs - Terms";
        return view('front.terms', compact('title'));
    }
    public function cart(){
        $slider = AllSlider::where('navbar_id','7')->where('status','1')->first();

        $title = "Thehygieneherbs - Cart";
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        
        $delivery_charges = DeliveryCharge::select('delivery_charges')->first();
        if(count($carts) > 0){
            return view('front.cart')->with(['carts'=>$carts,'title'=>$title,'slider'=>$slider, 'delivery_charges' => $delivery_charges]);
        }else{
            Session::flash('error','No product in cart!');
            return redirect()->route('home');
        }
        
    }

    public function checkout(){
        $title = "Thehygieneherbs - Checkout";
        $slider = AllSlider::where('navbar_id','8')->where('status','1')->first();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $userAddress = Order::where('user_id',Auth::user()->id)->first();
        $delivery_charges = DeliveryCharge::select('delivery_charges')->first();
       
        if(count($carts) > 0){
            return view('front.checkout', compact('title','slider','carts','userAddress','delivery_charges'));
        }else{
            Session::flash('error','No product in cart to checkout!');
            return redirect()->route('home');
        }
        
    }

    public function shopDetails(){
        $title = "Thehygieneherbs - Shop Details";
        return view('front.shop-details', compact('title'));
    }

    public function privacyPolicy()
    {
        $title = "Thehygieneherbs - Privacy Policy";
        $slider = AllSlider::where('navbar_id','5')->where('status','1')->first();
        $policies = Policy::first();
        return view('front.privacy-policy', compact('title','policies','slider'));
    }

     public function returnPolicy()
    {
        $title = "Thehygieneherbs - Return Policy";
        $slider = AllSlider::where('navbar_id','6')->where('status','1')->first();
        $return = ReturnRefund::first();
        return view('front.return-refund', compact('title','return','slider'));
    }

    public function myProfile(){
        $title = "Thehygieneherbs - My Profile";
        $slider = AllSlider::where('navbar_id','5')->where('status','1')->first();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $orderDetails = Order::select('orders.*','products.upload_image as image','products.name as name','order_details.quantity as quantity','orders.total_price as total_price','order_details.price as price')
        ->join('order_details','orders.id','order_details.order_id')
            ->join('products', 'products.id', 'order_details.product_id')
            ->where('orders.user_id', Auth::user()->id)->get();
        $user = Order::where('user_id',Auth::user()->id)->first();
        return view('front.myprofile', compact('title','slider','orders','user','orderDetails'));
    }

    public function checkpincode(Request $request){

        $pincode = DB::table('pincode')->where('pincode',$request->pincode)->get();
        if(count($pincode) > 0){
            return response()->json(array('status'=>true,'pincode'=>$request->pincode));
        }else{
            return response()->json(array('status'=>false));
        }

    }

    public function createOrder(Request $request){

        $apartment = $request->apartment;
        $area = $request->area;
        $city = $request->city;
        $landmark = $request->landmark;
        $name = $request->name;
        $paymethod = $request->paymethod;
        $phone = $request->phone;
        $pincode = $request->pincode;
        $state = $request->state;
        $orderno = time().'_'.Auth::user()->id;
        $email = Auth::user()->email;
        $date = date('d-m-Y');

        $total = 0;
        $delcharge = 0;

        $order = new Order;
        $order->order_no = $orderno;
        $order->user_id  = Auth::user()->id;
        $order->apartment = $apartment;
        $order->area = $area;
        $order->city = $city;
        $order->landmark = $landmark;
        $order->name = $name;
        $order->payment_method = $paymethod;
        $order->pincode  = $pincode;
        $order->state = $state;
        $order->total_price = 0.00;
        $order->discount = 0.00;
        $order->payment_type = "unpaid";
        $order->payment = 'pending';
        $order->save();

        $carts = Cart::where('user_id',Auth::user()->id)->get();
        foreach($carts as $cart){

            $delcharge = $delcharge + $cart->products->delivery_charge;
            $prosum = $cart->quantity * $cart->products->price;
            $total = $total + $prosum;

            $orderdet = new OrderDetail;
            $orderdet->order_id = $order->id;
            $orderdet->product_id = $cart->products_id;
            $orderdet->price = $cart->products->price;
            $orderdet->total = $prosum;
            $orderdet->quantity = $cart->quantity;
            $orderdet->save();
            Cart::where('id',$cart->id)->delete();

                $product = Product::findOrFail($cart->products_id);

                if($product->current_stock >= $cart->quantity) {
                    $product->update([
                        'current_stock' => DB::raw('current_stock - ' . $cart->quantity)
                    ]);
                    }
                    else {
                        Session::flash('error','Product is Out Of Stock!');
                       
                    }
            
    
        }
        Order::where('id',$order->id)->update(['total_price'=>$total,'discount'=>$delcharge]);
        
        // $current_stock = Product::select('current_stock')->where('id',$cart->products_id)->get();
        // $current_stock = $current_stock-$cart->quantity;
        // Product::where('id',$orderdet->product_id)->update(['current_stock'=>$current_stock]);
        
        // mail for order confirmation 

        $address = $apartment.', '.$area.', '.$landmark.', '.$city.', '.$state.', - '.$pincode;
        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'orderno' => $orderno,
            'address' => $address,
            'paymethod' => $paymethod,
            'orderstatus' => "unpaid",
            'orderdate' => $date,
        );
    
        try{
            Mail::send(['html'=>'front/mailtemplate/order_confirmation'], $data, function($message)  use ($email,$name) {
                $message->to($email,$name)->subject('Order Confirmation');
                $message->from('contact@hygieneherbs.in','Hygieneherbs Agro Fresh Pvt Ltd');
            });
        }catch(\Exception $e){
            echo "Message: ".$e->getMessage();
        }
        // mail for order confirmation 


        if($request->paymethod == 'cash_on_delivery'){
            return response()->json(array('status'=>true,'message'=>'Order Placed successfully!'));
        }else{
            return response()->json(array('status'=>false,'message'=>'You have not selected any payment mode!'));
        }
    }

    public function razorpay(Request $request){
        $ord = Order::where(['user_id'=>Auth::user()->id])->orderBy('id','desc')->first();

        // Success response
        // {"_token":"kE2QRyNgGtYdQdXncMXxWOXaRx9seJi4jBAGBnvk","":"pay_IBvbYNL7dFT7Lz","org_logo":null,"org_name":"Razorpay Software Private Ltd","checkout_logo":"https:\/\/cdn.razorpay.com\/logo.png","custom_branding":"false"}

        Order::where('id',$ord->id)->update(['payment_type'=>"paid",'payment'=>'success','online_txnid'=>$request->razorpay_payment_id]);

        Session::flash('success','Order made successfully!');
        return redirect()->route('myProfile');


    }
   

}