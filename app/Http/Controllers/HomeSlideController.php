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
use App\HomeSlide; 
class HomeSlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Home Slider";
      $subtitle="Home Slider";
      $activePage = "HomeSlider";
      $tCount=HomeSlide::select('*')->count();
      $home_slides=HomeSlide::select('home_slides.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(20);
        return view('admin.home_slide.list',compact('title','home_slides','activePage','subtitle','tCount'));
    }
  
    public function create()
    {
        $title = "Create Home Slider";
        $subtitle="HomeSlider";
        $activePage = "HomeSlider";
        return view('admin.home_slide.add',compact('title','activePage','subtitle'));
      
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'sub_title' => 'required',
            'title' => 'required',
            'offers' => 'required',
          
          
        ]);    
        
          
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='slide_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/homeslider');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        }

        $data=[
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'offers' => $request->offers,
            'img' =>  $image_name
        ];

        $result=HomeSlide::create($data);
        return redirect(route('home.slide.list'))->with('success', 'HomeSlider Successfully Added!');
    }
  
  
    public function edit(Request $request, $id)
    {
        $title = "Update HomeSlider";
        $subtitle="HomeSlider";
        $activePage = "HomeSlider";
        $homeslides=HomeSlide::where('id',$id)->first();
          return view('admin.home_slide.edit',compact('title','homeslides','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'sub_title' => 'required',
            'offers' => 'required'
          
        ]);   
        
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='slide_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/homeslider');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
        

        $data=[
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'offers' => $request->offers,
            'img' =>  $image_name,
            
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
    }else
    {
        $data=[
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'offers' => $request->offers,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
    }

    $result=HomeSlide::where('id',$id)->update($data);
    return redirect(route('home.slide.list'))->with('success', 'Home Slider Successfully Updated!');
    }

     public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = HomeSlide::where('id', $id)->delete();
        if ($delete){  
              return ['success' => 1, 'Slider Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
