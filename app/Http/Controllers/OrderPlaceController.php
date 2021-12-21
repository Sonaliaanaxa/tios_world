<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Order;
use App\Cart;
use App\OrderDetail;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderPlaceController extends Controller
{
    public function placeOrder(Request $request){
        $order_no = time();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $validator = Validator::make($request->all(),[
            'phone' => 'required|digits:10',
            'name' => 'required',
            'pincode' => 'required',
            'area' => 'required',
            'landmark' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'payment_method' => 'required',
        ]); 
        foreach($carts as $cart){
            $product_id = $cart->products_id;
            $quantity = $cart->quantity;
            $product_price = $cart->products->price;
            $discount = $cart->products->discount;
            $total_price = $product_price * $quantity;
        }
        if($validator->fails()){
            return redirect()->back()->with('error', 'Please enter all details!');
        }
        else {
            $order = new Order;
            dd($order);
            $order->order_no = $order_no;
            $order->product_id = $product_id;
            $order->total_price = $total_price;
            $order->discount = $discount;
            $order->quantity = $quantity;
            $order->user_id = Auth::user()->id;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->pincode = $request->pincode;
            $order->area = $request->area;
            $order->landmark = $request->landmark;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->payment_method = $request->payment_method;
            $order->save();

            $order_id = $order->id;

            $order_details = new OrderDetail;
            $order_details->order_id = $order_id;
            $order_details->product_id = $product_id;
            $order_details->price = $total_price;
            $order_details->quantity = $quantity;
            $order_details->delivery_status = 'pending';
            $order_details->save();

            $user = User::findOrFail(Auth::user()->id);
            $user->carts()->delete();
            dd($user);

            return back()->with('success', 'Order Placed!');
        }
    }
}
