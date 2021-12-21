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

use App\Message; 


use App\Http\Requests;

class MsgController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "All Messages";
      $subtitle="allMessages";
      $activePage = "Messages";
     $tmsg=Message::count();
     $nmsg=Message::where('view','0')->count();
      $msg=Message::select('*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(50);
       return view('admin.msg.list',compact('title','msg','activePage','subtitle','tmsg','nmsg'));
    }


    public function new()
    {
        $title = "New Messages";
      $subtitle="newMessages";
      $activePage = "Messages";
     $tmsg=Message::count();
     $nmsg=Message::where('view','0')->count();
      $msg=Message::where('view','0')
         ->orderBy('id','DESC')
      ->sortable()->paginate(50);
       return view('admin.msg.list',compact('title','msg','activePage','subtitle','tmsg','nmsg'));
    }

    public function view(Request $request, $id)
    {
        
      $subtitle="Messages";
      $activePage = "allMessages";
      $data['view']='1';
      Message::where('id',$id)->update($data);
      $tmsg=Message::count();
      $nmsg=Message::where('view','0')->count();
      $msg=Message::where('id',$id)->first();
      $title = $msg['subject'];
        return view('admin.msg.view',compact('title','msg','activePage','subtitle','id','tmsg','nmsg'));
    }
}
