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
use App\Policy;
class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Policy";
      $subtitle="Policy";
      $activePage = "Policy";
      $tCount=Policy::select('*')->count();
      $policies=Policy::select('policies.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(20);
        return view('admin.policy.list',compact('title','policies','activePage','subtitle','tCount'));
    }
  
    
  
  
    public function edit(Request $request, $id)
    {
        $title = "Update Policy";
        $subtitle="Policy";
        $activePage = "Policy";
        $policies=Policy::where('id',$id)->first();
          return view('admin.policy.edit',compact('title','policies','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
        'details' => 'required'
          
        ]);   
        
  

        

        $data=[
            'title' => $request->title,
            'details' => $request->details,
        
            
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       


    $result=Policy::where('id',$id)->update($data);
    return redirect(route('policy.list'))->with('success', 'Policy Successfully Updated!');
    }
}
