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

use App\Product;


use App\Http\Requests;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        $title = "Products";
      $subtitle="Products";
      $activePage = "Products";
      $pCount=Product::select('*')->count();
      $products=Product::select('products.*','categories.name as category_name')
      ->join('categories','products.category_id','categories.id')

         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
    //   $category=Category::get();

    

        return view('admin.products.list',compact('title','products','activePage','subtitle','pCount'));
    }

    public function mylist()
    {
        $title = "My Products";
      $subtitle="myProducts";
      $activePage = "Products";
      $pCount=Product::where('user_id',auth()->user()->id)->count();
      $products=Product::select('products.*','categories.name as category_name')
      ->where('user_id',auth()->user()->id)
      ->join('categories','products.category_id','categories.id')
  
      
         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
        return view('admin.products.list',compact('title','products','activePage','subtitle','pCount'));
    }
    
  
    public function create()
    {
        $title = "Create New Products";
        $subtitle="Products";
        $activePage = "Products"; 
  
        $categories=Category::get();
       
          return view('admin.products.add',compact('title','activePage','subtitle','categories'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'category_id' =>'required', 
         'currency'=>'required',
            'mrp' =>'required', 
            'price' =>'required',
            'discount' =>'required', 
            'saving' =>'required',
            'tax_type' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'details' =>'required', 
             'short_details' =>'required', 
            'weight' =>'required', 
            'unit' =>'required', 
            'stock' =>'required', 
            
            'status' =>'required'
          
        ]);   
        $pharm_id=0;
        if(isset($request->pharm_id))
        {
             $pharm_id = $request->pharm_id;            
        }
        else
        {
                $pharm_id = auth()->user()->id; 
        }
        
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
             if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
                $image_name ='product_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
           
        }
   
      

      

        $data=[
            'category_id' => $request->category_id,
        
            'name' => $request->name,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'stock' => $request->stock,
            'currency'=>$request->currency,
            'weight' => $request->weight,
            'unit' => $request->unit,
          
            'status' => $request->status,
            'user_id'=>auth()->user()->id,
            'user_type'=>auth()->user()->user_type,
            'user_name'=>auth()->user()->name,
            'user_email'=>auth()->user()->email,
            'user_mobile'=>auth()->user()->mobile,
            'img' =>  $image_name
        ];

       
        $result=Product::create($data);
        Category::where('id',$request->category_id)->increment('productNo', 1);
    
        
        return redirect(route('products.mylist'))->with('success', 'Products Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Products";
        $subtitle="Products";
        $activePage = "Products";
   
        $categories=Category::get();
       
        $product=Product::select('products.*','categories.name as category_name')
        ->where('products.id',$id)
        ->join('categories','products.category_id','categories.id')
  
           ->first();
          return view('admin.products.edit',compact('title','categories','product','activePage','subtitle','id','categories'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'category_id' =>'required', 
          
            'mrp' =>'required', 
            'price' =>'required',
            'discount' =>'required', 
            'saving' =>'required',
            'tax_type' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'short_details' =>'required',
            'details' =>'required', 
            'currency'=>'required',
            'weight' =>'required', 
            'unit' =>'required', 
            'stock' =>'required', 
         
            'status' =>'required'
          
        ]);
        
        $image_name='';
        
    

     if ($request->hasFile('myImage')) {
        $file = $request->file('myImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
        {
            $image_name ='product_'.time().'.'.$extension;
            $destinationPath = public_path('/uploads/products');
            $file->move($destinationPath, $image_name);
        }
        else
        {
            return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
        }

           
           
            

        $data=[
            'category_id' => $request->category_id,
          
            'name' => $request->name,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
              'short_details' => $request->short_details,
            'details' => $request->details,
            'stock' => $request->stock,
            'currency'=>$request->currency,
            'weight' => $request->weight,
            'unit' => $request->unit,
       
            'status' => $request->status,
           
            'img' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

      
       
    }else
    {
        $data=[
            'category_id' => $request->category_id,
          
            'name' => $request->name,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
              'short_details' => $request->short_details,
            'details' => $request->details,
            'stock' => $request->stock,
            'currency'=>$request->currency,
            'weight' => $request->weight,
            'unit' => $request->unit,
         
            'status' => $request->status,
   
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=Product::where('id',$id)->update($data);
    return redirect(route('products.mylist'))->with('success', 'Products Successfully Updated!');
    }

    public function view(Request $request, $id)
    {
        $title = "View Products";
        $subtitle="Products";
        $activePage = "Products";
        $product=Product::select('products.*','categories.name as category_name')
        ->where('products.id',$id)
        ->join('categories','products.category_id','categories.id')
       
           ->first();
          return view('admin.products.view',compact('title','product','activePage','subtitle','id'));
    }

  

    public function destroy(Request $request)
    {
        $id=$request->id; 
        $res=Product::select('category_id')->where('id',$id)->first();
  
        
        $delete = Product::where('id', $id)->delete();
        if ($delete){
    
            Category::where('id',$res->category_id)->decrement('productNo', 1);
        

              return ['success' => 1, 'Products Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }


}

 

