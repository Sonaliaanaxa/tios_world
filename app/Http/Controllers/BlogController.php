<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;

use App\User; 
use App\Blog;



use App\Http\Requests;

class BlogController extends Controller
{
    
    
        public function blog()
    {
        $title = "Blog";
      $subtitle="Blog";
      $activePage = "Blog";
      $pCount=Blog::select('*')->count();
      $blogs=Blog::select('blogs.*')


         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
 

    

        return view('admin.blog.blog',compact('title','blogs','activePage','subtitle','pCount'));
    }
            public function myblog()
    {
        $title = "Blog";
      $subtitle="Blog";
      $activePage = "Blog";
      $pCount=Blog::where('user_id',auth()->user()->id)->count();
      $blogs=Blog::select('blogs.*')
  ->where('user_id',auth()->user()->id)

         ->orderBy('id','DESC')
      ->sortable()->paginate(30);
 

    

        return view('admin.blog.blog',compact('title','blogs','activePage','subtitle','pCount'));
    }



   public function new(){

return view('admin.blog.new');

   }



   public function add_blog(){
        $activePage = "Blog";
     $title = "Create New Blog";
return view('admin.blog.add-blog')->with(compact('title','activePage'));


   }

    public function store(Request $request)
    {
 $this->validate(request(), [
            'blog_title' => 'required',

            'details' =>'required', 
             'short_details' =>'required' 
        
          
        ]);   

        
        $image_name='';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
             if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
            {
                $image_name ='blog_'.time().'.'.$extension;
                $destinationPath = public_path('/uploads/blog');
                $file->move($destinationPath, $image_name);
            }
            else
            {
                return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
            }
           
        }
   
      

      

        $data=[
         
        
            'blog_title' => $request->blog_title,
    
          
            'short_details' => $request->short_details,
            'details' => $request->details,
      
      
            'user_id'=>auth()->user()->id,
            'user_type'=>auth()->user()->user_type,
            'user_name'=>auth()->user()->name,
          
            'image' =>  $image_name
        ];

       
        $result=Blog::create($data);
   
        return redirect(route('blogs.list'))->with('success', 'Blog Successfully Added!');
    }

    public function editblog(Request $request, $id)
    {
        $title = "Update Blog";
    
        $activePage = "Blog";
   
     
       
        $blogs=Blog::select('blogs.*')
        ->where('blogs.id',$id)
       
  
           ->first();
          return view('admin.blog.edit-blog',compact('title','blogs','activePage','id'));
    }
  




public function edit(Request $request, $id)
{
$this->validate(request(), [
 
           'blog_title' => 'required',

            'details' =>'required', 
             'short_details' =>'required'  
        ]);
        
        $image_name='';
        
    

     if ($request->hasFile('myImage')) {
        $file = $request->file('myImage');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        if($extension=='png' || $extension=='jpg' || $extension=='jpeg')
        {
            $image_name ='blog_'.time().'.'.$extension;
            $destinationPath = public_path('/uploads/blog');
            $file->move($destinationPath, $image_name);
        }
        else
        {
            return redirect()->back()->with('error','Invalid file attached! Please updload the image!');
        }

           
           
            

        $data=[
            
    'blog_title' => $request->blog_title,
              'short_details' => $request->short_details,
            'details' => $request->details,
          
           
            'image' =>  $image_name,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

      
       
    }else
    {
        $data=[

            'blog_title' => $request->blog_title,
              'short_details' => $request->short_details,
            'details' => $request->details,
         
   
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    }

    $result=Blog::where('id',$id)->update($data);
     return redirect(route('blogs.list'))->with('success', 'Blog Successfully Updated!');

}
public function deleteblog(Request $request){

	$id = $request->input('id');

  $data = DB::table('blogs')->where('id',$id)->get();
foreach($data as $row){
    $img=$row->image;
    if(file::exists('public/uploads/blog/'.$img)){
        file::delete('public/uploads/blog/'.$img);

    }
}

blogs::where('id',$id)->delete();
return 1;

}



/*------------------------frontend--------------------------*/

public function view_blog_grid(){
 $data = blogs::all()->sortByDesc("id")->paginate(3);

  return view('home/blog-grid')->with(compact('data'));
}


public function search_blog(Request $request){
$search = $request->input('keyword');

$output = '';

$data = blogs::where('blog_title', 'LIKE', $search.'%')->get();
/*$data = blogs::where('blog_title', 'LIKE', $search.'%')->orWhere('user_name', 'LIKE', $search.'%')->orWhere('descriptions', 'LIKE', $search.'%')
        
                ->get();*/

  $output = '<ul id="country-list">';
    
  foreach($data as $row){
      $output .= '<li onClick="selectCountry('.$row->id.');">'.$row->blog_title.'</li>';

  }
 $output .= '</ul>';
       

/*
 foreach($data as $row){
      $output .= $row->blog_title.'<br>';
           
  }*/
 return $output;

}



public function blogdetails($id){
   $data = blogs::all()->where("id",$id);
    $datas = blogs::all()->sortByDesc("id");


        $getr = DB::table('doctor_reviews')
    ->select('doctor_reviews.patientId','doctor_reviews.id','doctor_reviews.updated_at','point','title','review','likes','name')
->orderBy('doctor_reviews.id','DESC')
    ->join('users', 'users.id', '=', 'doctor_reviews.patientId')

    ->get();
    
      $getw = DB::table('comments')
    ->select('comments.*','users.name','users.img')
->orderBy('comments.id','DESC')
    ->join('users', 'users.id', '=', 'comments.userId')
     ->join('blogs', 'blogs.id','=','comments.bid')

    ->get();


       $replay = DB::table('replys')
     ->select('reply','replys.updated_at','name','commentId')
    ->join('users', 'users.id', '=', 'replys.userId')
      ->join('doctor_reviews', 'doctor_reviews.id','=','replys.commentId')
     /*->join('doctor_reviews', 'doctor_reviews.patientId','=','users.id')*/
   
    ->get();

//$doimage = DB::table('users')->where('id',$id)->get('doctor_image');

$doimage = DB::table('blogs')
    ->select('users.id','users.name','users.img','users.biography')
    ->join('users', 'users.id', '=', 'blogs.user_id')
    ->get();
  return view('home/blog-details')->with(compact('data','datas','doimage','getr','replay','getw'));
}


public function blogcomment(Request $request){


$user_id = Auth::user()->id;
//echo $user_id;exit();

$data = array('userId'=>$user_id,
'typeId'=>'blog',
'comment'=>$request->input('comment'),
'bid'=>$request->input('bid'),
);
DB::table('comments')->insert($data);

return response()->json('Comment has been added successfully');
       
}






public function search_blogconatent(Request $request){
  $id=$request->input('title');
   $data = blogs::all()->where("id",$id);
    $datas = blogs::all()->sortByDesc("id");


        $getr = DB::table('doctor_reviews')
    ->select('doctor_reviews.id','doctor_reviews.updated_at','point','title','review','likes','name')
->orderBy('doctor_reviews.id','DESC')
    ->join('users', 'users.id', '=', 'doctor_reviews.patientId')

    ->get();


       $replay = DB::table('replys')
     ->select('reply','replys.updated_at','name','commentId')
    ->join('users', 'users.id', '=', 'replys.userId')
      ->join('doctor_reviews', 'doctor_reviews.id','=','replys.commentId')
     /*->join('doctor_reviews', 'doctor_reviews.patientId','=','users.id')*/
   
    ->get();

$doimage = DB::table('doctorprofiles')->where('id',$id)->get('doctor_image');
  return view('home/blog-details')->with(compact('data','datas','doimage','getr','replay'));
}

/*------------------------frontend--------------------------*/

}
