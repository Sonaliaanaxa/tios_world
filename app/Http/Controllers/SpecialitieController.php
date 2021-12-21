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
use App\Specialitie; 


use App\Http\Requests;

class SpecialitieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Specialities";
      $subtitle="Specialities";
      $activePage = "Specialities";
      $cCount=Specialitie::select('*')->count();
      $specialities=Specialitie::select('specialities.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.specialities.list',compact('title','specialities','activePage','subtitle','cCount'));
    }
  
    
  
    public function create()
    {
        $title = "Create New Specialities";
        $subtitle="Specialities";
        $activePage = "Specialities"; 
          return view('admin.specialities.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
          
        ]); 

        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='specialities_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/specialities');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        }
          
  

        $data=[
            'name' => $request->name,
            'img' =>  $image_name
        ];

        $result=Specialitie::create($data);
        return redirect(route('specialities.list'))->with('success', 'Specialities Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Specialities";
        $subtitle="Specialities";
        $activePage = "Specialities";
        $specialities=Specialitie::where('id',$id)->first();
          return view('admin.specialities.edit',compact('title','specialities','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required'
          
        ]);   
        
   $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
                if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
                {

                        $image_name ='specialities_'.time().'.'.$extension;
                        $destinationPath = public_path('/uploads/specialities');
                        $file->move($destinationPath, $image_name);
                }
                else
                {
                    return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
                }
           
        }
        
        

        $data=[
            'name' => $request->name,
     
            'img' =>  $image_name,
        
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       
 

    $result=Specialitie::where('id',$id)->update($data);
    return redirect(route('specialities.list'))->with('success', 'Specialities Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Specialitie::where('id', $id)->delete();
        if ($delete){
    
               
              return ['success' => 1, 'Specialities Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
