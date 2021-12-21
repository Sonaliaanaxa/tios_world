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
use App\BusinessPartner; 

use App\SubscriptionPlan;
use App\SubscriptionPayment;



class SubscriptionPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function atoSavePayment(Request $request)
    {
    
       
            $plan_id=$request->plan_id;

          
     
        $u_id=auth()->user()->id;
        $u_name=auth()->user()->name;
        $u_email=auth()->user()->email;
        $u_mobile=auth()->user()->mobile;
        $u_address=auth()->user()->address;
        $partner=auth()->user()->user_type;

        $data['u_id']=$u_id;
        $data['u_name']=$u_name;
        $data['u_email']=$u_email;
        $data['u_mobile']=$u_mobile;
        $data['u_address']=$u_address;
        $data['partner']=$partner;

        // $data['payment_status']='completed';
        $data['payment_method']='paytm';
     

        $subscriptionplan=SubscriptionPlan::where('id',$plan_id)->first();
        $price=$subscriptionplan['price'];
        $data['plan_id']=$request->plan_id;
       
        $data['splan_name']=$subscriptionplan['plan_name'];
        $data['p_price']=$subscriptionplan['price'];
        $data['p_currency']=$subscriptionplan['currency'];
        $data['p_tax']=$subscriptionplan['tax'];
        $data['p_tax_price']=$subscriptionplan['tax_price'];
        $data['p_total_price']=$subscriptionplan['total_price'];
        $data['vaild']=$subscriptionplan['vaild'];

        $invoice_no="INV".rand(1200,1000).rand(500,100000);
        $data['invoice_no']=$invoice_no;
        
        if($price >0){
        $result=SubscriptionPayment::create($data);
        return redirect(route('subscription.plans.payment'));
        }else{
         $data['payment_status']='completed';
         $data['payment_method']='offer';
         $result=SubscriptionPayment::create($data);
         
         $too="admin@medto.in";
         $to = $u_email;
         $name=$u_name;
         $subject = "Subscription confirmation";
         
                // To send HTML mail, the Content-type header must be set
 $headers = "From: admin@medto.in";
 
         
         
         // Compose a simple HTML email message
$message = '<html><body>';
$message .= '<p style="color:#080;font-size:18px;">Hi '.$name.'Thank you for subscribing to Medto. Get updates from medto that are most important to you. Let us know what types of 
updates you would like to receive</p>';
$message .= '</body></html>';
         
mail($to, $subject, $message, $headers);


mail($too, $subject, $message, $headers);



$phone   = $u_mobile;
$api_key = '36012AD7175995';
$contacts = $phone;
$from = 'SVMEDT';
$sms_text = urlencode('Thank you for subscribing to social vaidya. Get updates from social vaidya that are most important to you. Let us know what types of updates you would like to receive. SOCIAL VAIDYA MEDICAL PRIVATE LIMITED');
$template_id = '1007107028802406228';

$api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=10709&routeid=37&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=".$template_id;
//print_r($api_url);die;

                  $ch = curl_init();
                            // Set The Response Format to Json
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                            // Disable SSL verification
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            // Will return the response, if false it print the response
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            // Set the url
                            curl_setopt($ch, CURLOPT_URL, $api_url);
                            // Execute
                            $result = curl_exec($ch);
                        //echo"<pre>";print_r($result);
                            // Closing
                            curl_close($ch);






  return redirect(route('my.profile.view'));       
         
         
         
        }


// print_r($data);

    //  return redirect(route('subscription.my.payment.list'))->with('success', 'Payment Successfully!');
   
}

    public function index()
    {
        $title = "Subscription Payment";
      $subtitle="Subscription Payment";
      $activePage = "Subscription Payment";
      $spCount=SubscriptionPayment::select('*')->where('payment_status','completed')->count();
      $subscriptionpayment=SubscriptionPayment::select('subscription_payments.*')->where('payment_status','completed')
    
         ->orderBy('id','DESC')
      ->sortable()->paginate(50);
        return view('admin.subscription_plans.payment_list',compact('title','subscriptionpayment','activePage','subtitle','spCount'));
    } 
    
    public function myindex()
    {
        $title = "Payment";
      $subtitle="Payment";
      $activePage = "Payment";
      $spCount=SubscriptionPayment::where('u_id',auth()->user()->id)->where('payment_status','completed')->count();
      $subscriptionpayment=SubscriptionPayment::select('subscription_payments.*')->where('payment_status','completed')
      ->where('u_id',auth()->user()->id)
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.subscription_plans.payment_list',compact('title','subscriptionpayment','activePage','subtitle','spCount'));
    }
    public function planpay()
    {
        $title = "Payment Choice";
      $subtitle="Payment Choice";
      $activePage = "Payment";
      $spCount=SubscriptionPayment::where('u_id',auth()->user()->id)->where('payment_status','pending')->count();
      $subscriptionpayment=SubscriptionPayment::select('subscription_payments.*')->where('payment_status','pending')
      ->where('u_id',auth()->user()->id)
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.subscription_plans.plan_pay',compact('title','subscriptionpayment','activePage','subtitle','spCount'));
    }


    public function print(Request $request, $id)
    {
        $title = "Subscription Payment Invoice";
        $subtitle="Subscription Payment Invoice";
        $activePage = "Subscription Payment Invoice";
    
        $subscriptionpayment=SubscriptionPayment::select('subscription_payments.*')
        ->where('subscription_payments.id',$id)
           ->orderBy('id','DESC')
         
           ->sortable()->paginate(10);
          return view('admin.subscription_plans..print',compact('title','subscriptionpayment','activePage','subtitle'));
    }
    
              public function statusUpdate(Request $request)
            {
                $id=$request->id; 
                $data['status']=$request->status; 
                $res=SubscriptionPayment::where('id',$id)->update($data);
               
                if ($res){
            
                 
                      return ['success' => 1, 'Status Successfully Updated!'];
                      
                    }
                    else
                        {
                            return ['success' => 0, 'Error Occured!'];
                     
                        }     
            }
}
