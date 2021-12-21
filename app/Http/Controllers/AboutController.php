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
use App\About;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "About Us";
      $subtitle="About Us";
      $activePage = "About";
      $tCount=About::select('*')->count();
      $abouts=About::select('abouts.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(20);
        return view('admin.about.list',compact('title','abouts','activePage','subtitle','tCount'));
    }
  
    
  
  
    public function edit(Request $request, $id)
    {
        $title = "Update About";
        $subtitle="About";
        $activePage = "About";
        $abouts=About::where('id',$id)->first();
          return view('admin.about.edit',compact('title','abouts','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
        'details' => 'required'
          
        ]);   
        
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
                $image_name ='about_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/about');
                $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }

        

        $data=[
            'title' => $request->title,
            'details' => $request->details,
            'img' =>  $image_name,
            
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
    }else
    {
        $data=[
            'title' => $request->title,
            'details' => $request->details,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
    }

    $result=About::where('id',$id)->update($data);
    return redirect(route('about.list'))->with('success', 'About Us Successfully Updated!');
    }
}
