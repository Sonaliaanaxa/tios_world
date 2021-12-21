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
      $products=Product::select('products.*')->orderBy('id','DESC')->sortable()->paginate(5);

        return view('admin.products.list',compact('title','products','activePage','subtitle','pCount'));
    }

    
  
    public function create()
    {
        $title = "Create New Products";
        $subtitle="Products";
        $activePage = "Products"; 

          return view('admin.products.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'currency'=>'required',
            'discount' => 'required',
            'saving' => 'required',
            'price' =>'required', 
            'mrp' =>'required',
            'tax_type' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'description' =>'required', 
            'short_details' =>'required', 
            'weight' =>'required', 
            'unit' =>'required', 
            'min_qty' => 'required',
            'status' =>'required',
            'current_stock' => 'required',
            
           
          
        ]);   
       
        $image_name='../products/product-default.png';

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
        
            'name' => $request->name,
            'slug' => $request->slug,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'short_details' => $request->short_details,
            'description' => $request->description,
            'current_stock' => $request->current_stock,
            'currency'=>$request->currency,
           
            'weight' => $request->weight,
            'unit' => $request->unit,
            'min_qty' => $request->min_qty,
            'status' => $request->status,
            'user_id'=>auth()->user()->id,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'upload_image' =>  $image_name
        ];
       
       
        $result=Product::create($data);
        return redirect(route('products.list'))->with('success', 'Products Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Products";
        $subtitle="Products";
        $activePage = "Products";
   
        $product=Product::select('products.*')
        ->where('products.id',$id)
           ->first();
          return view('admin.products.edit',compact('title','product','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
           'name' => 'required',
            'slug' => 'required',
            'currency'=>'required',
            'discount' => 'required',
            'saving' => 'required',
            'price' =>'required', 
            'mrp' =>'required',
            'tax_type' =>'required',
            'tax' =>'required',
            'tax_price' =>'required',
            'description' =>'required', 
            'short_details' =>'required', 
            'weight' =>'required', 
            'unit' =>'required', 
            'min_qty' => 'required',
            'status' =>'required',
            'current_stock' => 'required'
          
        ]);
        
        if($request->hasFile('myImage')) {
         $image_name=base64_encode(file_get_contents($request->file('myImage')));
        }
        else {
            $image_name='products/product-default.png';
        }


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
          
           'name' => $request->name,
            'slug' => $request->slug,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'short_details' => $request->short_details,
            'description' => $request->description,
           
            'currency'=>$request->currency,
            'weight' => $request->weight,
            'unit' => $request->unit,
            'min_qty' => $request->min_qty,
            'status' => $request->status,
            'current_stock' => $request->current_stock,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'user_id'=>auth()->user()->id,
            'upload_image' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

      
       
    }else
    {
        $data=[
           
            'name' => $request->name,
            'slug' => $request->slug,
            'mrp' => $request->mrp,
            'price' => $request->price,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
           
            'short_details' => $request->short_details,
            'description' => $request->description,
            'current_stock' => $request->current_stock,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'currency'=>$request->currency,
            'weight' => $request->weight,
            'unit' => $request->unit,
            'min_qty' => $request->min_qty,
            'status' => $request->status,
            'user_id'=>auth()->user()->id,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=Product::where('id',$id)->update($data);
    return redirect(route('products.list'))->with('success', 'Products Successfully Updated!');
    }

    public function view(Request $request, $id)
    {
        $title = "View Products";
        $subtitle="Products";
        $activePage = "Products";
        $product=Product::select('products.*')
        ->where('products.id',$id)
           ->first();
          return view('admin.products.view',compact('title','product','activePage','subtitle','id'));
    }

  

    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Product::where('id', $id)->delete();
        if ($delete){
            
            return response()->json(array('status'=>true,'message'=>'Product Deleted Successfully!'));
              
            }
            else
                {
                    return response()->json(array('status'=>false,'message'=>'Error!'));
             
                }
     
    }


}

 

