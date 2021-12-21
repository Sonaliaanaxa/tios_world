<?php

use App\User; 
use App\Category;
use App\Product;
use App\Order;
use App\Web;
use App\BusinessPartner;
use App\SubscriptionPlan;
use App\Specialitie; 
use App\BloodbankRequest;
use App\HomeSlide;
use App\About;
use App\Blog;
use App\Policy;
use App\Homenotification;
use App\Procomment;
use App\Procommentreply;
//-----------------------------Orders-------------------------------
function totalOrders()
{
   $orders=Order::select('*')->where('payment','1')->count();
   return $orders;
}

function allOrders()
{
   $orders=Order::distinct('order_no')->where('payment','1')->groupBy('order_no')->count();
   return $orders;
}

function newOrders()
{
   $orders=Order::distinct('order_no')->where('payment','1')->where('status','new')->count();
   return $orders;
}

function processingOrders()
{
   $orders=Order::distinct('order_no')->where('payment','1')->where('status','processing')->count();
   return $orders;
}

function completedOrders()
{
   $orders=Order::distinct('order_no')->where('payment','1')->where('status','completed')->count();
   return $orders;
}

function cancelledOrders()
{
   $orders=Order::distinct('order_no')->where('payment','1') ->where('status','cancelled')->count();
   return $orders;
}

function countOrder($order_no)
{
   $res=Order::where('order_no',$order_no)->where('payment','1')->count();
return $res;
}


function myorders()
{
 
   $res=Order::where('user_id',auth()->user()->id)->where('payment','1')->count();
   return $res;
}

//-----------------------------Payments-------------------------------
function completedPayments()
{
   $payments=Order::where('payment','1')->sum('total_price');
   return $payments;
}

function allPayments()
{
   $payments=Order::where('payment','1')->sum('total_price');
   return $payments;
}

function newPayments()
{
   $payments=Order::distinct('order_no')->where('payment','1')->where('status','new')->sum('total_price');
   return $payments;
}

function pendingPayments()
{
   $payments=Order::where('billing_det','1')->where('payment','0')->sum('total_price');
   return $payments;
}


function monthPayments()
{
   $month=date('F');
   $year=date('Y');
   $payments=Order::distinct('order_no')->where('payment','1')->where('month',$month)->where('year',$year)->sum('total_price');
   return $payments;
}

function yearPayments()
{
   $month=date('F');
   $year=date('Y');
   $payments=Order::distinct('order_no')->where('payment','1')->where('year',$year)->sum('total_price');
   return $payments;
}
function myPayments()
{
 
   $res=Order::where('user_id',auth()->user()->id)->where('payment','1')->sum('total_price');
   return $res;
}

//--------------Products, category--------------------------

function products()
{
   
   $res=Product::select('*')->count();
   return $res;
}
function myproducts()
{
 
   $res=Product::where('user_id',auth()->user()->id)->count();
   return $res;
}


function category()
{
   $res=Category::select('*')->count();
   return $res;
}

function getCategory()
{
   $res=Category::get();
   return $res;
}

function getProduct()
{
   $res=Product::get();
   return $res;
}



function getWeb()
{
   $res=Web::where('id','1')->first();
   return $res;
}
function getHomenotification()
{
   $res=Homenotification::where('id','1')->first();
   return $res;
}
//-------------cart & order-------------------------
function countCart()
{
   if(isset(auth()->user()->id))
   {
   $res=Order::where('user_id',auth()->user()->id)->where('cart','1')->count();
   return $res;
   }
   else
   {
      $res=0;
      return $res;
   }
  
}

function alreadyInCart($product_id)
{
   if(isset(auth()->user()->id))
   {
   $res=Order::where('user_id',auth()->user()->id)->where('product_id',$product_id)->where('cart','1')
   ->where('order','0')->count();
   return $res;
   }
   else
   {
      $res=0;
      return $res;
   }

  
  
}


function getBusinessPartners5()
{
   $res=BusinessPartner::limit('5')->get();
   return $res;
}
function getBusinessPartners4()
{
   $res=BusinessPartner::limit('4')->get();
   return $res;
}
function getSubscriptionPlan()
{
   $res=SubscriptionPlan::get();
   return $res;
}

function getSpecialities()
{
   $res=Specialitie::get();
   return $res;
}

//--------------Doctors--------------------------

function allDoctors()
{
 
   $res=User::where('user_type','doctor')->count();
   return $res;
}


//--------------patient--------------------------

function allPatient()
{
 
   $res=User::where('user_type','patient')->count();
   return $res;
}


//--------------Pharmacy--------------------------

function allPharmacy()
{
 
   $res=User::where('user_type','pharmacy')->count();
   return $res;
}


//--------------Hospital--------------------------

function allHospital()
{
 
   $res=User::where('user_type','hospital')->count();
   return $res;
}


//--------------Diagonostics--------------------------

function allDiagonostics()
{
 
   $res=User::where('user_type','diagnostic')->count();
   return $res;
}


//--------------Blood Bank--------------------------

function allBloodBank()
{
 
   $res=User::where('user_type','blood_bank')->count();
   return $res;
}

function getBloodBank()
{
 
   $res=User::where('user_type','blood_bank')->where('status','1')->where('approve','1')->get();
   return $res;
}

function allBloodBankDonate()
{
 
   $res=BloodbankRequest::where('user_type','donate')->count();
   return $res;
}

function allBloodBankRequest()
{
 
   $res=BloodbankRequest::where('user_type','request')->count();
   return $res;
}
function myBloodBankDonate()
{
 
   $res=BloodbankRequest::where('user_type','donate')->where('bank_id',auth()->user()->id)->count();
   return $res;
}

function myBloodBankRequest()
{
 
   $res=BloodbankRequest::where('user_type','request')->where('bank_id',auth()->user()->id)->count();
   return $res;
}

// ---------------End blood bank---------------------//

function getAbout()
{
   $res=About::where('id','1')->first();
   return $res;
}
function getPolicy()
{
   $res=Policy::where('id','1')->first();
   return $res;
}
function getService()
{
   $res=Service::where('id','1')->first();
   return $res;
}
function getHomeSlide1()
{
   $res=HomeSlide::where('id','1')->first();
   return $res;
}

function getBlog12()
{
   $res=Blog::limit('12')->orderBy("id", "desc")->get();
   return $res;
}

function getProductComment()
{
   $res=Procomment::get();
   return $res;
}
function getProductCommentReply()
{
   $res=Procommentreply::get();
   return $res;
}