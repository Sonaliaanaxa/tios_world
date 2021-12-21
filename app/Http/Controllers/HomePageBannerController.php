<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePageBanner;

class HomePageBannerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $title = "Home Page Banner";
      $subtitle = "Page Banner";
      $activePage = "PageBanner";
      $tCount=HomePageBanner::select('*')->count();
      $home_slides =HomePageBanner::select('home_page_banners.*')
                              ->orderBy('id','DESC')
                              ->sortable()
                              ->paginate(20);
        return view('admin.home_banner.list',compact('title','home_slides','activePage','subtitle','tCount'));
    }
  
    public function create()
    {
       $title = "Add Home Banner";
        $subtitle = "Add Banner";
        $activePage = "AllBanner";
        return view('admin.home_banner.add',compact('title','activePage','subtitle'));  
    }
  
    
    public function save(Request $request)
    { 
        $this->validate(request(), [
            'sub_title' =>'required', 
            'title' =>'required',
            'offers' => 'required'
          
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
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'offers' => $request->offers,
            'image' =>  $image_name,
        ];
        $result=HomePageBanner::create($data);
        return redirect(route('home.banner.list'))->with('success', 'Banner Successfully Added!');
    }
  
  
    public function edit(Request $request, $id)
    {
         $title = "Update HomePageBanner";
        $subtitle="HomePageBanner";
        $activePage = "HomePageBanner";
        $homeslides=HomePageBanner::where('id',$id)->first();
          return view('admin.home_banner.edit',compact('title','homeslides','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'sub_title' =>'required',
            'offers' => 'required'
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
            'sub_title' => $request->sub_title,
            'title' => $request->title,
            'offers' => $request->offers,
            'image' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];   
        }
        else {
              $data=[
           'sub_title' => $request->sub_title,
            'title' => $request->title,
            'offers' => $request->offers,
            'updated_at'=>date('Y-m-d H:i:s')
        ];   
        } 
    
    //dd($data);
    $result=HomePageBanner::where('id',$id)->update($data);
    return redirect(route('home.banner.list'))->with('success', 'Banner Successfully Updated!');
    }

     public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = HomePageBanner::where('id', $id)->delete();
        if ($delete){  
              return redirect()->back()->with('success','Banner Deleted Successfully!');
              
            }
            else
                {
                   return redirect()->back()->with('error','Error Occured!');
             
                }
     
    }
}
