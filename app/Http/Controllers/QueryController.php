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
use App\Query; 


use App\Http\Requests;

class QueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Query";
      $subtitle="Query";
      $activePage = "Query";
      $qCount=Query::select('*')->count();
      $queries=Query::select('queries.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.queries.list',compact('title','queries','activePage','subtitle','qCount'));
    }
  
    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Query::where('id', $id)->delete();
        if ($delete){
    
               
              return ['success' => 1, 'Query Successfully Deleted!'];
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
