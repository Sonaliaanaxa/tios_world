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


class SubscriptionPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')

         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  
        return view('admin.subscription_plans.list',compact('title','subscriptionplans','activePage','subtitle','pCount'));
    }

    public function planDoctors()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->where('buspart_id','1')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
      ->where('buspart_id','1')
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  $spCount=SubscriptionPayment::where('u_id',auth()->user()->id)->where('payment_status','completed')->where('payment_method','offer')->count();
// print_r(auth()->user()->id);die;
        return view('admin.subscription_plans.plan',compact('title','subscriptionplans','activePage','subtitle','pCount','spCount'));
    }
    public function planBloodBank()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->where('buspart_id','2')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
      ->where('buspart_id','2')
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  
        return view('admin.subscription_plans.plan',compact('title','subscriptionplans','activePage','subtitle','pCount'));
    }
    public function planDiagonostics()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->where('buspart_id','3')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
      ->where('buspart_id','3')
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  
        return view('admin.subscription_plans.plan',compact('title','subscriptionplans','activePage','subtitle','pCount'));
    }
    public function planHospital()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->where('buspart_id','4')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
      ->where('buspart_id','4')
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  
        return view('admin.subscription_plans.plan',compact('title','subscriptionplans','activePage','subtitle','pCount'));
    }
    public function planPharmacy()
    {
        $title = "Subscription Plan";
      $subtitle="Subscription Plan";
      $activePage = "SubscriptionPlan";
      $pCount=SubscriptionPlan::select('*')->where('buspart_id','5')->count();
      $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partners_name')
      ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
      ->where('buspart_id','5')
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
  
        return view('admin.subscription_plans.plan',compact('title','subscriptionplans','activePage','subtitle','pCount'));
    }

 

    
    public function create()
    {
        $title = "Create New Subscription Plan";
        $subtitle="SubscriptionPlan";
        $activePage = "SubscriptionPlan"; 
  
        $businesspartners=BusinessPartner::get();
       
          return view('admin.subscription_plans.add',compact('title','activePage','subtitle','businesspartners'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'plan_name' => 'required',
            'buspart_id' =>'required', 
           'currency'=>'required',
            'price' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'total_price' =>'required',
            'vaild' =>'required',
            'details' =>'required', 
            'status' =>'required'
          
        ]);   

        
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
             if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
                $image_name ='subscriptionplans_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/subscriptionplans');
                $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
           
        }
   
      

      

        $data=[
            'buspart_id' => $request->buspart_id,
            'plan_name' => $request->plan_name, 
            'price' => $request->price,
            'vaild' => $request->vaild,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'total_price' => $request->total_price,
            'details' => $request->details,
            'currency'=>$request->currency,
            'status' => $request->status,
            'img' =>  $image_name
        ];

       
        $result=SubscriptionPlan::create($data);
        BusinessPartner::where('id',$request->buspart_id)->increment('BusinessPartnerNo', 1);
    
        
        return redirect(route('subscription.plans.list'))->with('success', 'Subscription Plan Successfully Added!');
    }

  
    public function edit(Request $request, $id)
    {
        $title = "Update SubscriptionPlan";
        $subtitle="SubscriptionPlan";
        $activePage = "SubscriptionPlan";
   
        $business_partners=BusinessPartner::get();
       
        $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as business_partner_name')
        ->where('subscription_plans.id',$id)
        ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
  
           ->first();
          return view('admin.subscription_plans.edit',compact('title','business_partners','subscriptionplans','activePage','subtitle','id','business_partners'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'plan_name' => 'required',
            'buspart_id' =>'required', 
           'currency'=>'required',
           
            'price' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'total_price' =>'required',
            'vaild' =>'required',
            'details' =>'required', 
            'status' =>'required'
          
        ]);
        
        $image_name='';
        
    

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
             if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
                $image_name ='subscriptionplans_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/subscriptionplans');
                $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
           
     
           
           
            

        $data=[
            'buspart_id' => $request->buspart_id,
          
            'buspart_id' => $request->buspart_id,
            'plan_name' => $request->plan_name, 
            'price' => $request->price,
            'vaild' => $request->vaild,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'total_price' => $request->total_price,
            'details' => $request->details,
            'currency'=>$request->currency,
            'status' => $request->status,
            'img' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

      
       
    }else
    {
        $data=[
            'buspart_id' => $request->buspart_id,
            'plan_name' => $request->plan_name, 
            'price' => $request->price,
            'vaild' => $request->vaild,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'total_price' => $request->total_price,
            'details' => $request->details,
            'currency'=>$request->currency,
            'status' => $request->status,
      
   
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=SubscriptionPlan::where('id',$id)->update($data);
    return redirect(route('subscription.plans.list'))->with('success', 'SubscriptionPlan Successfully Updated!');
    }
    
    public function view(Request $request, $id)
    {
        $title = "View SubscriptionPlan";
        $subtitle="SubscriptionPlan";
        $activePage = "SubscriptionPlan";
        $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as businesspartner_name')
        ->where('subscription_plans.id',$id)
        ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
       
           ->first();
          return view('admin.subscription_plans.view',compact('title','subscriptionplans','activePage','subtitle','id'));
    }

    public function planview(Request $request, $id)
    {
        $title = "View Subscription Plan";
        $subtitle="SubscriptionPlan";
        $activePage = "SubscriptionPlan";
        $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as businesspartner_name')
        ->where('subscription_plans.id',$id)
        ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
       
           ->first();
          return view('admin.subscription_plans.plan_detail',compact('title','subscriptionplans','activePage','subtitle','id'));
    }
    public function planpay(Request $request)
    {
        $title = "Subscription Plan Payment";
        $subtitle="SubscriptionPlan";
        $activePage = "SubscriptionPlan";
        $subscriptionplans=SubscriptionPlan::select('subscription_plans.*','business_partners.name as businesspartner_name')
        ->where('subscription_plans.id',$id)
        ->join('business_partners','subscription_plans.buspart_id','business_partners.id')
       
           ->first();
          return view('admin.subscription_plans.plan_pay',compact('title','subscriptionplans','activePage','subtitle','id'));
    }


    public function destroy(Request $request)
    {
        $id=$request->id; 
        $res=SubscriptionPlan::select('buspart_id')->where('id',$id)->first();
  
        
        $delete = SubscriptionPlan::where('id', $id)->delete();
        if ($delete){
    
            BusinessPartner::where('id',$res->buspart_id)->decrement('BusinessPartnerNo', 1);
        

              return ['success' => 1, 'Subscription Plan Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }

}