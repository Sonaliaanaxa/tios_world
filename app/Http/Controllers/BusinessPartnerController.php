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


use App\Http\Requests;

class BusinessPartnerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "BusinessPartner";
      $subtitle="BusinessPartner";
      $activePage = "BusinessPartner";
      $cCount=BusinessPartner::select('*')->count();
      $businesspartners=BusinessPartner::select('business_partners.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.business_partners.list',compact('title','businesspartners','activePage','subtitle','cCount'));
    }
  
    
  
    public function create()
    {
        $title = "Create New BusinessPartner";
        $subtitle="BusinessPartner";
        $activePage = "BusinessPartner"; 
          return view('admin.business_partners.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'link' => 'required'
          
        ]); 

        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='businesspartners_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/businesspartners');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        }
          
  

        $data=[
            'name' => $request->name,
            'link' => $request->link,
            'img' =>  $image_name
        ];

        $result=BusinessPartner::create($data);
        return redirect(route('business.partners.list'))->with('success', 'BusinessPartner Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update BusinessPartner";
        $subtitle="BusinessPartner";
        $activePage = "BusinessPartner";
        $businesspartners=BusinessPartner::where('id',$id)->first();
          return view('admin.business_partners.edit',compact('title','businesspartners','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'link' => 'required'
          
        ]);   
        
   $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='businesspartners_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/businesspartners');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
       
        
        

        $data=[
            'name' => $request->name,
            'link' => $request->link,
            'img' =>  $image_name,
        
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
    }else
    {
        $data=[
            'name' => $request->name,
            'link' => $request->link,
        
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=BusinessPartner::where('id',$id)->update($data);
    return redirect(route('business.partners.list'))->with('success', 'BusinessPartner Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = BusinessPartner::where('id', $id)->delete();
        if ($delete){
    
               
              return ['success' => 1, 'BusinessPartner Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
