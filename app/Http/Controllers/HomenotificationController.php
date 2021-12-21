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
use App\Homenotification; 


use App\Http\Requests;

class HomenotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Homenotification";
      $subtitle="Homenotification";
      $activePage = "Homenotification";
      $cCount=Homenotification::select('*')->count();
      $homenotifications=Homenotification::select('homenotifications.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.home_notification.list',compact('title','homenotifications','activePage','subtitle','cCount'));
    }
  
    
  
    public function edit(Request $request, $id)
    {
        $title = "Update Homenotification";
        $subtitle="Homenotification";
        $activePage = "Homenotification";
        $homenotifications=Homenotification::where('id',$id)->first();
          return view('admin.home_notification.edit',compact('title','homenotifications','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'link' => 'required'
          
        ]);   
        
   $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='homenotifications_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/homenotifications');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
       
        
        

        $data=[
            'title' => $request->title,
          'link' => $request->link,
            'img' =>  $image_name,
        
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
    }else
    {
        $data=[
            'title' => $request->title,
            'link' => $request->link,
        
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=Homenotification::where('id',$id)->update($data);
    return redirect(route('home.notification.list'))->with('success', 'Homenotification Successfully Updated!');
    }

}

