<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;

use App\User; 
use App\AllSlider; 
use App\Navbar;
class AllSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $title = "Sliders";
      $subtitle = "All Slider";
      $activePage = "AllSlider";
      $tCount=AllSlider::select('*')->count();
      $allSlider=AllSlider::select('all_sliders.*')
                              ->orderBy('id','DESC')
                              ->sortable()
                              ->paginate(20);
        return view('admin.all_slider.list',compact('title','allSlider','activePage','subtitle','tCount'));
    }
  
    public function create()
    {
       $title = "Add Slider";
        $subtitle = "Add Slider";
        $activePage = "AllSlider";
        $navBar=Navbar::get();
        return view('admin.all_slider.add',compact('title','activePage','subtitle','navBar'));  
    }
  
    
    public function save(Request $request)
    { 
        $this->validate(request(), [
            'navbar_id' =>'required', 
            'title' =>'required',
          
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
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg' || $extension == 'gif')
                {

                        $image_name ='banner_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/banner');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        }

        $data=[
            'navbar_id' => $request->navbar_id,
            'title' => $request->title,
            'image' =>  $image_name,
        ];
        $result=AllSlider::create($data);
        Navbar::where('id',$request->navbar_id); 
        return redirect(route('all.slider.list'))->with('success', 'Slider Successfully Added!');
    }
  
  
    public function edit(Request $request, $id)
    {
         $title = "Update Slider";
        $subtitle="Slider";
        $activePage = "Slider";
        $navBar=Navbar::get();
        $allSlider=AllSlider::select('all_sliders.*','navbars.name as navbar_name')
                            ->where('all_sliders.id',$id)
                            ->join('navbars','all_sliders.navbar_id','navbars.id')
                            ->first();
          return view('admin.all_slider.edit',compact('title','allSlider','activePage','subtitle','id','navBar'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'navbar_id' =>'required' 
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
            $image_name ='product_'.time().'.'.$extension;
            $destinationPath = public_path('/uploads/banner');
            $file->move($destinationPath, $image_name);
        }
        else
        {
            return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
        }

    

        $data=[
            'navbar_id' => $request->navbar_id,
            'title' => $request->title,
            'image' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];   
        }
        else {
              $data=[
            'navbar_id' => $request->navbar_id,
            'title' => $request->title,
            'updated_at'=>date('Y-m-d H:i:s')
        ];   
        } 
    
    //dd($data);
    $result=AllSlider::where('id',$id)->update($data);
    return redirect(route('all.slider.list'))->with('success', 'Slider Successfully Updated!');
    }

     public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = AllSlider::where('id', $id)->delete();
        if ($delete){  
              return redirect()->back()->with('error','Slider Deleted Successfully!');
              
            }
            else
                {
                   return redirect()->back()->with('error','Error Occured!');
             
                }
     
    }
}
