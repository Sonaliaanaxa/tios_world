<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use App\Askquestion; 


use App\Http\Requests;

class AskquestionController extends Controller
{
    public function index()
    {
        $title = "Askquestion";
      $subtitle="Askquestion";
      $activePage = "Askquestion";
      $aCount=Askquestion::select('*')->count();
      $askquestion=Askquestion::select('askquestions.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.askquestion.list',compact('title','askquestion','activePage','subtitle','aCount'));
    }

    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Askquestion::where('id', $id)->delete();
        if ($delete){
    
               
              return ['success' => 1, 'Askquestion Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
  
}
