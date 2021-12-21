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

use App\City; 
use App\Web; 

use App\Http\Requests;

class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Website Setting";
      $subtitle="Web";
      $activePage = "Web";
  
      $web=Web::select('*')
         ->orderBy('id','ASC')->limit(1)->first();

      //   print_r($web);
       return view('admin.web.edit',compact('title','web','activePage','subtitle'));
    }


    public function saveInfo(Request $request)
    {
      $this->validate(request(), [
        'name' => 'required',
        'url' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'mobile2' => 'required',
        'email2' => 'required',
        'address' => 'required',
         'gst' => 'required',
          'cin' => 'required',
        'fb' => 'required',
        'youtube' => 'required',
        'twitter' => 'required',
        'instagram' => 'required',
        'whatsapp' => 'required',
        'skype' => 'required',
        'linkedin'=>'required'
        
   
      
    ]);

    $id=$request->id;
    //$data['logo']='';
   


      if ($request->hasFile('myImage')) {
          $file = $request->file('myImage');
          $extension = $file->getClientOriginalExtension(); // getting image extension
              if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
              {

                  $data['logo'] ='logo_'.time().'.'.$extension;
                      $destinationPath = public_path('/uploads/logo');
                      $file->move($destinationPath, $data['logo']);

                      Web::where('id',$id)->update($data);
              }
              else
              {
                  return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
              }
      
      }

       

            Web::where('id',$id)->update(request(['name','url','mobile','email','mobile2','gst','cin','email2','fb','whatsapp','youtube','twitter','instagram','address','linkedin','skype']));
           return redirect()->back()->with('success','Website Information Successfully Updated!');

    }


    public function cityList()
    {
        $title = "Cities";
      $subtitle="City";
      $activePage = "Web";
  
      $cCount=City::count();
      $city=City::select('cities.*')
      ->orderBy('id','DESC')
       ->sortable()->paginate(20);
       return view('admin.city.list',compact('title','city','activePage','subtitle','cCount'));
    }

    public function addCity(Request $request)
    {
        $title = "Add City";
      $subtitle="City";
      $activePage = "Web";
      
      return view('admin.city.add',compact('title','activePage','subtitle'));
    }

    public function saveCity(Request $request)
    {
        $title = "Cities";
      $subtitle="Web";
      $activePage = "City";

      $this->validate(request(), [
        'name' => 'required',     
    ]);    

      $data['name']=$request->name;
  
      City::create($data);
      return redirect(route('cities'))->with('success', 'City Successfully Added!');
    }
    public function editCity(Request $request,$id)
    {
        $title = "Update City";
      $subtitle="Web";
      $activePage = "City";
      
      
  
      $city=City::where('id',$id)->first();
      return view('admin.city.edit',compact('title','activePage','subtitle','city','id'));
    }
    public function updateCity(Request $request,$id)
    {
     

      $this->validate(request(), [
        'name' => 'required',     
    ]);
      
      $data['name']=$request->name;
      $data['status']=$request->status;
      $city=City::where('id',$id)->update($data);
      return redirect(route('cities'))->with('success', 'City Successfully Updated!');
    }


    public function destroyCity(Request $request)
    {
        $id=$request->id; 
        
        $delete = City::where('id', $id)->delete();
        if ($delete){
    
              return ['success' => 1, 'City Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
   

}
