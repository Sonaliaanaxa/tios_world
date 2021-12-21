<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\User; 
use App\SideSlider;

class SideSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $title = "Side Slider";
      $subtitle="Side Slider";
      $activePage = "SideSlider";
      $tCount=SideSlider::select('*')->count();
      $home_slides=SideSlider::select('side_sliders.*')->orderBy('id','DESC')->sortable()->paginate(20);
        return view('admin.side_slider.list',compact('title','home_slides','activePage','subtitle','tCount'));
    }
  
    public function create()
    {
        $title = "Create Side Slider";
        $subtitle="SideSlider";
        $activePage = "SideSlider";
        return view('admin.side_slider.add',compact('title','activePage','subtitle'));
      
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'status' => 'required',  
        ]);    
        
          
        if($request->hasFile('myImage')) {
         $image_name=base64_encode(file_get_contents($request->file('myImage')));
        }
        else {
            $image_name='';
        }

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
            'status' => $request->status,
            'img' =>  $image_name
        ];

        $result=SideSlider::create($data);
        return redirect(route('side.slider.list'))->with('success', 'HomeSlider Successfully Added!');
    }
  
  
    public function edit(Request $request, $id)
    {
        $title = "Update SideSlider";
        $subtitle="SideSlider";
        $activePage = "SideSlider";
        $homeslides=SideSlider::where('id',$id)->first();
          return view('admin.side_slider.edit',compact('title','homeslides','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'status' => 'required'
          
        ]);   
        
       if($request->hasFile('myImage')) {
         $image_name=base64_encode(file_get_contents($request->file('myImage')));
        }
        else {
            $image_name='default.png';
        }

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
            'status' => $request->status,
            'img' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
    }else
    {
        $data=[
            'title' => $request->title,
            'status' => $request->status,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
    }

    $result=SideSlider::where('id',$id)->update($data);
    return redirect(route('side.slider.list'))->with('success', ' Slider Successfully Updated!');
    }

     public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = SideSlider::where('id', $id)->delete();
        if ($delete){  
             return redirect()->back()->with('success','Slider Deleted Successfully!');
              
            }
            else
                {
                    return redirect()->back()->with('success','Error Occured!');
             
                }
     
    }
}
