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
use App\Askquestion; 
use App\Product;
use App\Order;
use App\BusinessPartner;
use App\SubscriptionPlan;
use App\BloodbankRequest;
use App\Message;
use App\Query;
use App\Blog;
use App\Procomment;
use App\Procommentreply;

/*----------shailendra------------*/
use App\Doctorschedule;
use App\Scheduletime;
use App\Doctorprofile;
use App\Speciality;
use App\Patient;
use App\DoctorReview;
use App\DoctorModel;
use Illuminate\Support\Facades\DB;
use App\blogs;

/*----------------shailendra end-------------------*/

use App\Http\Requests;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
      $title = "Social Vaidya";
            //$favdoctor = DoctorModel::all();
            $favdoctor = User::where('user_type','doctor')->where('status','1')->where('approve','1')->get();;
            $blogs = blogs::all()->sortByDesc("id")->take(4);

        return view('home.index',compact('title','favdoctor','blogs'));
    }
    public function header(Request $request)
    {
      $title = "Social Vaidya";
      $categories=Category::get();

        return view('home.layouts.header',compact('title','categories'));
    }
    public function businessPartners(Request $request)
    {
      $title = "Business Partners";
      
        return view('home.business_partners',compact('title'));
    }
public function appointmentBook(Request $request)
    {
      $title = "Appointment Book";
      
        return view('home.appointment_book',compact('title'));
    }

    public function subscriptionplanshome(Request $request,$buspart_id)
    {
      $title = "Subscription Plan";
      $businesspartners=BusinessPartner::where('id',$buspart_id)->first();

      $subscriptionplans=SubscriptionPlan::where('buspart_id',$buspart_id)->where('status','1')->paginate(18);
      
      return view('home.sub_plans',compact('title','buspart_id','businesspartners','subscriptionplans'));
    }

    public function blog(Request $request)
    {
      $title = "Blog";
      
        return view('home.blog',compact('title'));
    }
    
    public function view_blog_grid(Request $request)
    {
      $title = "Blog";
      $blogs=Blog::select('*')
      
   ->orderBy('id','DESC')
  
   ->sortable()->paginate(6);

        return view('home.blog-grid',compact('title','blogs'));
    }
    

 public function bloodbank(Request $request)
    {
      $title = "Blood Bank";
      $users=User::where('user_type','blood_bank')->where('status','1')->where('approve','1')
      
      ->orderBy('id','DESC')
     
      ->sortable()->paginate(15);

        return view('home.blood_bank',compact('title','users'));
    }
    public function bloodbankDetails(Request $request, $id)
    {
    

      $users = User::where('id',$id)->first();
      User::where('id',$id);
      $title = $users['name'];
      
      return view('home.bloodbank_details',compact('title','users','id'));
    }

    public function askQuestion(Request $request)
    {
      $title = "Ask Question";
      
        return view('home.ask_question',compact('title'));
    }
    public function saveaskQuestion(Request $request)
    {
        $this->validate(request(), [
            
            'email' => 'required',
            'phone' =>'required',
            'looking_for' => 'required',
            'detail' => 'required',
     
          
        ]);    
        
        $data=[
              
            'email' => $request->email,
            'phone' => $request->phone,      
            'looking_for' => $request->looking_for,
            'detail' => $request->detail,
 
            
        ];

        $result=Askquestion::create($data);
         return redirect()->back()->with('success', 'Askquestion Successfully submitted!');
        // return redirect(route('home'))->with('success', 'Askquestion Successfully Added!');
    }

    public function contact(Request $request)
    {
      $title = "Contact Us";

      return view('home.contact',compact('title'));
    }
    public function contactSave(Request $request)
    {
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required',
        'mobile' => 'required',
        'subject' => 'required',
        'msg' => 'required',
      
    ]);    
    
   

    $data=[
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'subject' => $request->subject,
        'msg' => $request->msg

      
    ];

    $result=Message::create($data);


    return redirect()->back()->with('success','Message Successfully Submitted! Soon you will be contacted by our team!');
    }
    public function query(Request $request)
    {
      Query::create(request(['name','email','mobile']));
        
    return redirect()->back()->with('success','Query Successfully Submitted! Soon you will be contacted by our team!');
    }
    public function about(Request $request)
    {
      $title = "About-Us";
      
        return view('home.about',compact('title'));
    }

    public function policy(Request $request)
    {
      $title = "Policy";
      
        return view('home.policy',compact('title'));
    }
    public function categories(Request $request)
    {
      $title = "All Categories";
      
      return view('home.categories',compact('title'));
    }

    public function products(Request $request,$category_id)
    {
      $title = "Products";
      $category=Category::where('id',$category_id)->first();

      $products=Product::select('products.*')->join('users','products.user_id','users.id')
          ->where('category_id',$category_id)->where('products.status','1')->where('users.approve','1')->where('stock','1')->paginate(18);
     
    
      return view('home.products',compact('title','category_id','category','products'));
    }


    public function productDetails(Request $request, $id)
    {
    

      $product = Product::where('id',$id)->first();
      Product::where('id',$id)->increment('view','1');
      $title = $product['name'];
      
      $avg=0;
      
      $total_rating=Procomment::where('product_id',$id)->sum('rating');
      $total_review=Procomment::where('product_id',$id)->count();
      
      if($total_review>=1)
      {
      $avg=$total_rating/$total_review;
     $avg=round($avg);
      }
      
      return view('home.product-details',compact('title','product','id','avg'));
    }


    public function commentSave(Request $request)
    {
      $this->validate(request(), [
        'msg' => 'required',
   
      
    ]);    
    
   

    $data=[
        'rating' => $request->rating,
       'product_id' => $request->product_id,
            'name'=>auth()->user()->name,
        'msg' => $request->msg

      
    ];

    $result=Procomment::create($data);
    
// print_r($data);

    return redirect()->back()->with('success','Successfully Submitted!');
    }
       public function commentreplySave(Request $request)
    {
      $this->validate(request(), [
        'msg' => 'required',
   
      
    ]);    
    
   

    $data=[
  
       'product_id' => $request->product_id,
            'comment_id' => $request->comment_id,
            'name'=>auth()->user()->name,
        'msg' => $request->msg

      
    ];

    $result=Procommentreply::create($data);
    
// print_r($data);

    return redirect()->back()->with('success','Successfully Submitted!');
    }
    //----------------AddCart--------------------------------------------



          public function addCart(Request $request)
          {
                  
                
                $product_id=$request->product_id;
                $quantity=$request->quantity;
                $user_id=auth()->user()->id;
                $user_name=auth()->user()->name;
                $user_email=auth()->user()->email;
                $user_mobile=auth()->user()->mobile;
                $user_address=auth()->user()->address;
                $user_city=auth()->user()->city;
                $user_state=auth()->user()->state;
                $user_zipcode=auth()->user()->zipcode;
                $user_country=auth()->user()->country;
               

                $exitProduct=Order::where('user_id',$user_id)->where('product_id',$product_id)->where('cart','1')
                ->where('order','0')->count();
           
                $product=Product::where('id',$product_id)->first();

                $data['product_id']=$request->product_id;
                $data['category_id']=$product['category_id'];
               
                $data['product_name']=$product['name'];
                $data['mrp']=$product['mrp'];
                $data['price']=$product['price'];
                $data['currency']=$product['currency'];
                $data['discount']=$product['discount'];
                $data['saving']=$product['saving'];
                $data['tax_type']=$product['tax_type'];
                $data['tax']=$product['tax'];
                $data['tax_price']=$product['tax_price'];
                  $data['img']=$product['img'];
             
                $data['seller_id']=$product['user_id'];
                $data['seller_name']=$product['user_name'];
                $data['seller_email']=$product['user_email'];
                $data['seller_mobile']=$product['user_mobile'];

                $data['quantity']=$request->quantity;
               
                $data['cart']='1';
                $data['order']='0';
                $data['user_id']=$user_id;
                $data['user_name']=$user_name;
                $data['user_email']=$user_email;
                $data['user_mobile']=$user_mobile;
                $data['user_address']=$user_address;
                $data['user_city']=$user_city;
                $data['user_state']=$user_state;
                $data['user_zipcode']=$user_zipcode;
                $data['user_country']=$user_country;

                $result=Order::create($data);
          
                // print_r ($data);
                
                    return redirect(route('cart'))->with('success', 'Product Added to Cart!');
          }

          public function cart(Request $request)
          {
            $title = "My cart";
            $user_id=auth()->user()->id;
            
            $cart=Order::select('orders.id as o_id','orders.product_id','orders.quantity as quantity','products.*')
            ->where('orders.user_id',$user_id)
            ->where('orders.cart','1')
           
      
            ->join('products','orders.product_id','products.id')
            ->get();

            $cCount=$cart->count();

           
            return view('home.cart',compact('title','cart','cCount'));
          }
          public function deleteCartProduct(Request $request)
          {
           
            $id=$request->id; 
          
            $delete = Order::where('id',$id)->delete();
      
            if ($delete){
               return ['success' => 1, 'Product Successfully Deleted!'];
                  
                }
                else
                    {
                        return ['success' => 0, 'Error Occured!'];
                 
                    }
          }
          public function updateQuantity(Request $request)
          {
           
            $id=$request->id;
            $data['quantity'] =$request->quantity;
          
            $res = Order::where('id',$id)->update($data);

            // print_r($data);
      
            if ($res){
           return ['success' => 1, 'Product Successfully Updated!'];
                  
                }
                else
                    {
                        return ['success' => 0, 'Error Occured!'];
                 
                    }
          }


//checkout
          public function checkout(Request $request)
          {
            $title = "Checkout";
            $user_id=auth()->user()->id;
            $cart=Order::select('orders.id as o_id','orders.product_id','orders.quantity as quantity','products.*','orders.*')
           ->where('payment','0')
            ->where('orders.user_id',$user_id)
            ->where('orders.cart','1')
            ->where('orders.order','0')
            
         
            ->join('products','orders.product_id','products.id')
            ->get();
                    $cCount=$cart->count();
           

            return view('home.checkout',compact('title','cart','cCount'));
          }


           function placeOrder(Request $request)
          {
    
            
            $user_id=auth()->user()->id;

            Order::where('user_id',$user_id)
            ->where('orders.cart','1')
            ->where('orders.order','0')
            
            ->update(request(['final_price','final_saving','payment_method','user_mobile','user_name','user_address','final_taxprice','final_subtoatal_price','user_city','user_state','user_zipcode','user_country']));


            $user_id=auth()->user()->id;

            Order::where('user_id',$user_id)
            ->where('orders.cart','1')
            ->where('orders.order','0');

          
           
               $order_no="MED".rand(1200,1000).rand(500,100000);
               $data_id['order_no']=$order_no;

               Order::where('user_id',$user_id)
                ->where('orders.cart','1') ->where('orders.order','0')
                ->update($data_id);

                $data['view']='0';
            //   $data['cart']='0';
            //     $data['order']='1';
                 $data['billing_det']='1';
                $data['status']='new';
                $data['month']=date('F');
                $data['year']=date('Y');
                $data['created_at']=date('Y-m-d H:i:s');
                $data['updated_at']=date('Y-m-d H:i:s');

                Order::where('user_id',$user_id)
                ->where('orders.cart','1') ->where('orders.order','0')->where('order_no',$order_no)
                ->update($data);

                $cart=Order::select('id','product_id','quantity')->where('order_no',$order_no)->get();
                foreach($cart as $r)
                {
                  $product_id=$r->product_id;
                  $pro=Product::where('id',$product_id)->first();
                  $data_1['mrp']=$pro['mrp'];
                  $data_1['price']=$pro['price'];
                  $data_1['discount']=$pro['discount'];
                  $data_1['saving']=$pro['saving'];
                  $data_1['subtotal_price']=(($pro['price']*$r->quantity)-($pro['tax_price']* $r->quantity));
                  $data_1['total_price']=$pro['price']*$r->quantity;
                  $data_1['total_saving']=$pro['saving']*$r->quantity;
                  $data_1['tax_type']=$pro['tax_type'];
                  $data_1['tax']=$pro['tax'];
                  $data_1['tax_price']=$pro['tax_price'];
                  $data_1['total_taxprice']=$pro['tax_price']*$r->quantity;;
                  $data_1['img']=$pro['img']; 
                
                  
                  Order::where('id',$r->id)->update($data_1);

             
            //   print_r($data_1);
            //     print_r($data);
              
                   //  return redirect(route('orderHistory'))->with('success','Order Successfully Placed!');
                    return redirect()->back()->with('success', 'success','Order Successfully Submit');
          }
        }
          public function productPayment(Request $request)
          {
            $title = "Product Payment";
            $user_id=auth()->user()->id;
            $cart=Order::select('orders.id as o_id','orders.product_id','orders.order_no','orders.quantity as quantity','products.*','orders.*')
            ->where('orders.user_id',$user_id)
              
            ->where('orders.cart','0')
            ->where('orders.order','1')
            ->join('products','orders.product_id','products.id')
            ->get();

            return view('home.prod_payment',compact('title','cart'));
          }



          function orderHistory()
          {
                $title = "Order History";
                $user_id=auth()->user()->id;
                $cart=Order::select('orders.*','products.weight','products.unit')->where('orders.user_id',$user_id)
                ->where('orders.cart','0')
                ->where('orders.order','1')
                ->join('products','orders.product_id','products.id')
                ->orderBy('id','DESC')
                 ->groupBy('order_no')
                ->get();

                
                return view('home.order-history',compact('title','cart'));

          }
          

 public function searchedProduct(Request $request)
          {
            
            $searched=$request->searched;
          
            $title = $searched;

          
            $products=Product::where('name','like','%'.$searched.'%')->where('status','1')
            
           ->paginate(18);

            $pCount=$products->count();
       //  print_r($products);
         
            return view('home.searched-product',compact('title','searched','products','pCount'));
    
          }
          
          
     
      
      // ---------------Blood Bank-----------------------------//

public function bloodbankRequest(Request $request)
{
    
       $data3=array();
$this->validate(request(), [
    'name' => 'required|min:3',
    'email' => 'required',
    'mobile_no'=>'required',
 
    'blood_group' => 'required',
    'gender' => 'required',
    'appoint_date' => 'required',
 
   'user_type'=>'required'
]);
$image_name='';

if ($request->hasFile('myImage')) {
    $file = $request->file('myImage');
    $extension = $file->getClientOriginalExtension(); // getting image extension
        if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
        {

                $image_name ='bloodbank_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/bloodbankrd');
                $file->move($destinationPath, $image_name);
                 $data3['img']=$image_name;
        }
        else
        {
            return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
        }
   
}
$bank_id=$request->bank_id;
$data1=[
    'name' => $request->name,
    'email' => $request->email,
    'mobile_no' => $request->mobile_no,
    'age' => $request->age,
    'height' => $request->height,
    'hunit' => $request->hunit,
    'weight' => $request->weight,
    'wunit' => $request->wunit,
    'blood_group' => $request->blood_group,
    'gender' => $request->gender,
    'appoint_date' => $request->appoint_date,
    'address' => $request->address,
    'user_type' => $request->user_type,
  
];

$user=User::where('id',$bank_id)->first();

$data2['bank_id']=$request->bank_id;
$data2['bank_name']=$user['name'];
$data2['bank_email']=$user['email'];
$data2['bank_mobile']=$user['mobile'];
$data2['bank_address']=$user['address'];

$order_no="MED".rand(1200,1000).rand(500,100000);
$data2['order_no']=$order_no;

$data=array_merge($data1,$data2,$data3);
$result=BloodbankRequest::create($data);

   $to = $request->email;
               $subject = "Youre Request for Blood Bank  Successfully Submitted.";
               $txt = "Welcome to Social Vaidya !
              
               Name : $request->name .
               Email : $request->email .
               Appoint Date : $request->appoint_date .
               
           
               Website Link :https://demoaanaxagorasr.net/socialvaidya";
          
      
             
               $headers = "From: nikkynavvya24@gmail.com";
             
              
               mail($to,$subject,$txt,$headers);

return redirect(route('blood.bank'))->with('success', ' Successfully Submit!');
}

// ------------------End Blood Bank---------------------//
          public function searchedBloodBank(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

          
            $users=User::where('address','like','%'.$searched.'%')->where('user_type','blood_bank')->where('status','1')->where('approve','1')
            
           ->paginate(10);
          
            $pCount=$users->count();
            
              return view('home.search_bloodbank',compact('title','searched','users','pCount'));
          }
          public function searchedDocaddress(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

          
            $users=User::where('address','like','%'.$searched.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
          
            $pCount=$users->count();
            
              return view('home.doc_dig_hos_searchs',compact('title','searched','users','pCount'));
          }
          public function searchedDocDigHos(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

          
            $users=User::where('name','like','%'.$searched.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
          
            $pCount=$users->count();
            
              return view('home.doc_dig_hos_searchs',compact('title','searched','users','pCount'));
          }
          
               public function searchedDocDigHosKeyword(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

          
            $users=User::where('name','like','%'.$searched.'%')->orWhere('city','like','%'.$searched.'%')->orWhere('address','like','%'.$searched.'%')->orWhere('specialization','like','%'.$searched.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
          
            $pCount=$users->count();
            
              return view('home.doc_dig_hos_searchs',compact('title','searched','users','pCount'));
          }
          
          public function searchedDocspeciality(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

/*
 $users=User::where('specialization','like','%'.$searched.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
           
 */
           
           
          if(!$searched){
    
  $users=User::where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
} else {
 $users=User::where('specialization','like','%'.$searched.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')
            
           ->paginate(10);
           
}
          
            $pCount=$users->count();
            if($users->count()){
            
              return view('home.doc_dig_hos_searchs',compact('title','searched','users','pCount'));
            }
          }
          public function searchedBlog(Request $request)
          {
            $searched=$request->searched;
          
            $title = $searched;

          
            $blogs=Blog::where('blog_title','like','%'.$searched.'%')
            
           ->paginate(18);
          
            $pCount=$blogs->count();
            
              return view('home.search_blog',compact('title','searched','blogs','pCount'));
          }

 public function searchedhome(Request $request)
          {


            $location=isset($request->location)?$request->location:'';
            $dochos=isset($request->dochos)?$request->dochos:'';
            $specialit=isset($request->specialit)?$request->specialit:'';
            $users=User::where('status','1')->where('approve','1')->paginate(18);
         
           if(($location) && ($dochos) && ($specialit)  )
           {
            $users=User::where('address','like','%'.$location.'%')->where('user_type','like','%'.$dochos.'%')->where ('specialization','like','%'.$specialit.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
            
           }else
           { 
            if(($location) && ($dochos) && ($specialit=='')  ){
            
              $users=User::where('address','like','%'.$location.'%')->where('user_type','like','%'.$dochos.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             elseif(($location) && ($dochos=='') && ($specialit)  ){
              
              $users=User::where('address','like','%'.$location.'%')->where ('specialization','like','%'.$specialit.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             elseif(($location=='') && ($dochos) && ($specialit)  ){
              
              $users=User::where('user_type','like','%'.$dochos.'%')->where ('specialization','like','%'.$specialit.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             elseif(($location=='') && ($dochos=='') && ($specialit)  ){
             
              $users=User::where ('specialization','like','%'.$specialit.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             elseif(($location=='') && ($dochos) && ($specialit=='')  ){
              
              $users=User::where('user_type','like','%'.$dochos.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             elseif(($location) && ($dochos=='') && ($specialit=='')  ){
              
              $users=User::where('address','like','%'.$location.'%')->where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }
             else{
              
              $users=User::where('status','1')->where('approve','1')->where('user_type','!=','admin')->where('user_type','!=','patient')->paginate(18);
             }

           }
        
           $pCount=$users->count();
              return view('home.doc_dig_hos_searchs',compact('users','pCount'));
          }

          //------------- Order History ---------------------//

          public function invoiceprint(Request $request, $id)
          {
              $order_no=$id;
              $title = "View Order Details";
            $subtitle="Orders";
            $activePage = "Orders";
         
            $oCount=Order::distinct('order_no')->where('order','1')  ->where('order_no',$order_no)->count();
            $orders=Order::select('*')
                  ->where('order','1')
                  ->where('order_no',$order_no)
                  ->get();
              return view('home.product_invoice',compact('title','orders','activePage','subtitle','oCount','order_no'));
          }
      



/*-------------------------shailendra start-------------------*/


          public function searchdoctor(){
            //echo $id;exit();
               /* $doctor = Doctorprofile::get();
                $schedule = Doctorschedule::get();
                */
             $doctor = User::where('user_type','doctor')->where('status','1')->where('approve','1')->paginate(10);
              // $docs = DB::table('subscription_payments')->where('u_name',ucfirst($id))->get();
                $schedule = Doctorschedule::get();
                //return view('home.searchs',compact('doctor','schedule'));
                
                return view('socialvaidya.search')->with(compact('doctor','schedule'));
            }
          
         
          public function searchdoctors($id){
           // echo strtolower($id);exit();
                $doctor = User::where('user_type',strtolower($id))->where('status','1')->where('approve','1')->paginate(10);
                //print_r($doctor);die;
                //$doctor = User::where('subscription_payments',strtolower($id))->get();
               $docs = DB::table('subscription_payments')->where('u_name',ucfirst($id))->get();
                $schedule = Doctorschedule::get();
                return view('home.searchs',compact('doctor','schedule','docs'));
            }
          
          
               public function specelists($id){
            //echo strtolower($id);exit();
                $doctor = User::where('specialization',strtolower($id))->where('status','1')->where('approve','1')->paginate(10);
                //$doctor = User::where('subscription_payments',strtolower($id))->get();
               $docs = DB::table('subscription_payments')->where('u_name',ucfirst($id))->get();
                $schedule = Doctorschedule::get();
                return view('home.searchs',compact('doctor','schedule','docs'));
            }
          
        
          public function viewdoctorprofile($id=null){
          //$this->getreview();
          
            
                $emails = Session::get('email');
          
                $getr = DB::table('doctor_reviews')
            ->select('doctor_reviews.doctorId','point','title','review','name')
            ->join('users', 'users.id', '=', 'doctor_reviews.patientId')
            ->get();
          
          
            /*    $getc = DB::table('comments')
             ->select('comment','name')
             ->where('comments.review_id','doctor_reviews.id')
            ->join('users', 'users.id', '=', 'comments.userId')
             ->join('doctor_reviews', 'doctor_reviews.patientId','=','users.id')
             
            ->get();
          
            foreach($getc as $po){
            echo $po->comment;
            echo $po->name;
          }
          exit();*/
          //echo $id;exit();
               $docs = DB::table('subscription_payments')->where('u_id',$id)->get();

          
          
              $speciality=Speciality::get();
    $schedule = Doctorschedule::where('doctorId',$id)->get();
        $doctor = Doctorprofile::where('userid',$id)->first();
              //$doctor = Doctorprofile::where('id',$id)->first();
                $patientdetails = Patient::where(['id'=>$id])->first();
                   $review = DoctorReview::get();
                   //echo $doctor;exit();
                return view('socialvaidya.doctor-profile')->with(compact('doctor','schedule','speciality','docs','patientdetails','review','getr'));
            }
          
            

        
          public function viewprofiles($id=null){
          //$this->getreview();
          
                $emails = Session::get('email');
          
                $getr = DB::table('doctor_reviews')
            ->select('doctor_reviews.doctorId','likes','point','title','review','name')
            ->join('users', 'users.id', '=', 'doctor_reviews.patientId')
            ->get();
          
     $docs = DB::table('subscription_payments')->where('u_id',$id)->where('status','active')->get();

          
              $speciality=Speciality::get();
      $schedule = Scheduletime::where('user_id',$id)->get();
              $doctor = User::where('id',$id)->first();


    /* $doctor = DB::table('users')
            ->select('users.*')
            ->join('users', 'users.id', '=', 'subscription_payments.u_id')->where('id',$id)
            ->get();*/

              $patientdetails = Patient::where(['id'=>$id])->first();
                   $review = DoctorReview::get();
                   //echo $doctor;exit();
                return view('home.view-profile')->with(compact('doctor','schedule','speciality','docs','patientdetails','review','getr'));
            }
          
             
       /*---------------------shailendra start-------------------*/
  public function searchedDocminmax(Request $request)
  {

    $min=$request->min;
  
    $max=$request->max;
 
   // $title = $searched;
$datass = array('0'=>$min,'1'=>$max);


  
    $users=User::where('price','>',$min)->where('price','<',$max)
    
   ->paginate(18);
  
    $pCount=$users->count();
     //print_r('aaa');die;
      return view('home.doc_dig_hos_searchs',compact('users','pCount','datass'));
  }



/*---------------------shailendra end------------------*/   
             

/*-------------------------shailendra end------------------------*/


public function savereviews(Request $request){
    //$emails = Session::get('email');
     $emails=auth()->user()->email;

   $pat = DB::table('users')->where('email',$emails)->get();
foreach($pat as $p){
   $patientId = $p->id;

} 
$date = date("Y-m-d H:i:s");

     $data = array( 'point' => $request->input('rating'),
                    'title' => $request->input('title'),
                    'review' => $request->input('review'),
                    'doctorId' => $request->input('doctorId'),
                    'patientId' => $patientId,
                    'created_at' => $date,
                    'updated_at'=> $date
                    
                );
DB::table('doctor_reviews')->insert($data);
return back()->with('success',True);
}



public function comments(Request $request){
    /*echo"ok";
    exit();*/


    $date = date("Y-m-d H:i:s");
if(auth()->user()->email){
 $emails=auth()->user()->email;
 $da=DB::table('users')->where('email',$emails)->get('id');

 foreach($da as $row){
$id = $row->id;

 }
     $data = array( 'reply' => $request->input('comment'),
                    'typeId' => 'review',
                    'userId'=> $id,
                    'commentId'=>$request->input('commentid'),
                    'status'=>1,
                    'created_at' => $date,
                    'updated_at' => $date   
                );


 DB::table('replys')->insert($data);
return back()->with('succ',True);
}
else{
  return back()->with('succ',True);
}

}





/*--------------------home search-------------------------*/
public function homesearch(){
  return view('home.homesearch');
}




public function homesearchloc(Request $request){
  $search = $request->input('keyword');
  //$search = '';

$output = '';

$data = User::where('city', 'LIKE', $search.'%')->distinct()->get(['city']);


  $output = '<ul id="country-list" style="width:85%!important;position:absolute;
   /* top:48px;*/
    z-index:99;margin-top:0px!important;">';
    
  foreach($data as $row){
       $output .= '<li onClick="selectCountry(\''. $row->city . '\');" value='.$row->city.'>'.$row->city.'</li>';

  }
 $output .= '</ul>';
      

 return $output;

}



public function hospitalname(Request $request){
  $search = $request->input('keywords');
  $key = $request->input('key');

  //$search = 'd';
   //$key = 'd';
$output = '';

$data = User::where('name', 'LIKE', $search.'%')->where('city',$key)->where('user_type','!=','admin')->where('user_type','!=','patient')->get();


  $output = '<ul id="country-list"  style="width:85%!important; position:absolute;
   /* top:48px;*/
    z-index:99; margin-top:0px!important;">';
    
  foreach($data as $row){
       $output .= '<li onClick="selectCountrys(\''. $row->name . '\');" value='.$row->name.'>'.$row->name.'</li>';

  }
 $output .= '</ul>';
      

 return $output;

}



public function homespeciality(Request $request){
  $search = $request->input('keywords');
  $key = $request->input('key');
  $hospital = $request->input('spe');

  //$search = 'd';
   //$key = 'd';
$output = '';

  //  $data = User::where('user_type','!=','admin')->where('user_type','!=','patient')->get();
$data = User::where('name', $hospital)->where('city',$key)->where('specialization','LIKE', $search.'%')->where('user_type','!=','admin')->where('user_type','!=','patient')->get();
  $output = '<ul id="country-list"  style="width:85%!important; position:absolute;
   /* top:48px;*/
    z-index:99;margin-top:0px!important;">';
    
  foreach($data as $row){
      if($row->specialization!=''){
       $output .= '<li onClick="selectCountryss(\''. $row->specialization . '\');" value='.$row->specialization.'>'.$row->specialization.'</li>';
}
  }
 $output .= '</ul>';
      

 return $output;

}


public function searchdocs(Request $request){
  $city = $request->input('city');
  $name = $request->input('doname');
  $spe = $request->input('specialist');
  if($city==''||$name==''||$spe==''){
    return back();
  }else{
$datas = User::where([
     'city' => $city,
     'name' => $name,  
     'specialist' => $spe,   
])->get('userid');
if($datas->count()){

foreach($datas as $row){
$id = $row->userid;

}


$getr = DB::table('doctor_reviews')->select('doctor_reviews.doctorId','point','title','review','name')
  ->join('users', 'users.id', '=', 'doctor_reviews.patientId')
  ->get();


          $speciality=Speciality::get();
          $schedule = Doctorschedule::get();
          $doctor = Doctorprofile::where('id',$id)->first();
         $patientdetails = Patient::where(['id'=>$id])->first();
         $review = DoctorReview::get();
      return view('socialvaidya.doctor-profile')->with(compact('doctor','schedule','speciality','patientdetails','review','getr'));
   
  }
  else{
  $dd="Sorry! No Data found!";
    return back()->with('suc',$dd); 


  }

}
}/*--------------------home search end-------------------------*/





}
