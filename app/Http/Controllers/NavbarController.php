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
use App\Navbar; 

use App\Http\Requests;

class NavbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Navbar";
      $subtitle="Navbar";
      $activePage = "Navbar";
      $cCount=Navbar::select('*')->count();
      $navbars=Navbar::select('navbars.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.navbar.list',compact('title','navbars','activePage','subtitle','cCount'));
    }
  
    public function create()
    {
        $title = "Create New Navbar";
        $subtitle="Navbar";
        $activePage = "Navbar"; 
          return view('admin.navbar.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'link' => 'required'
        ]);    
        
          
  

        $data=[
            'name' => $request->name,
            'link' => $request->link,
           
        ];

        $result=Navbar::create($data);
        return redirect(route('navbar.list'))->with('success', 'Navbar Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Navbar";
        $subtitle="Navbar";
        $activePage = "Navbar";
        $navbars=Navbar::where('id',$id)->first();
          return view('admin.navbar.edit',compact('title','navbars','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'link' => 'required'
          
        ]);   

        $data=[
            'name' => $request->name,
            'link' => $request->link,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
   
    $result=Navbar::where('id',$id)->update($data);
    return redirect(route('navbar.list'))->with('success', 'Navbar Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Navbar::where('id', $id)->delete();
        if ($delete){
              return redirect()->back()->with('success','Navbar Deleted Successfully!');
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
