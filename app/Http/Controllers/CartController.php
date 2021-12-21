<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart(Request $request){
        $title = "Thehygieneherbs - Add to Cart";
        $proid = $request->proid;
        $qty = $request->qty;
        if($qty < 1){
           Session::flash('error','Quantity Can not be 0!');
           Cart::where('products_id',$proid)->where('user_id',Auth::user()->id)->delete();
           return back();
        }
        
        $product=Product::where('id',$proid)->first();

            if(!Auth::check())
            {
                return view('front.login');
            }
            else{
               
                    $product = Product::findOrFail($proid);
                    if($product->current_stock < $qty) {
                        Session::flash('error','Product is Out Of Stock!');
                        return back();
                           
                        }

                   
                $cart = Cart::where(['products_id'=>$proid,'user_id'=>Auth::user()->id])->get();
                    if(count($cart) > 0){
                        Cart::where(['products_id'=>$proid,'user_id'=>Auth::user()->id])
                                ->update([
                                    'products_id'=>$proid,
                                    'quantity' => $qty,
                                    'mrp' => $product['mrp'],
                                    'price' => $product['price'],
                                    'currency' => $product['currency'],
                                    'tax' => $product['tax']
                                    ]);
                    }
                    
                    else {
                        $data=[
                            'products_id' => $proid,
                            'user_id' => Auth::user()->id,
                            'quantity' => $qty,
                            'mrp' => $product['mrp'],
                            'price' => $product['price'],
                            'currency' => $product['currency'],
                            'tax' => $product['tax'],
                        ];
                        $result=Cart::create($data); 
                    }
                }

                Session::flash('success','Product added to Cart Successfully!');

    }
    public function deleteCartProduct($cart_id){
        $carts = Cart::find($cart_id);
        if($carts){
            $carts->delete();
            // flash('Cart has been deleted successfully')->success();
            return back();
           
        }
    }

}
