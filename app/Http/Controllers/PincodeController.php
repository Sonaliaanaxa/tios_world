<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Pincode; 


class PincodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $title = "Pincode";
      $subtitle="Pincode";
      $activePage = "Pincode";
      $cCount=Pincode::select('*')->count();
      $navbars=Pincode::select('pincode.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(10);
        return view('admin.pincode.list',compact('title','navbars','activePage','subtitle','cCount'));
    }
  
    public function create()
    {
        $title = "Create New Pincode";
        $subtitle="Pincode";
        $activePage = "Pincode"; 
          return view('admin.pincode.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'pincode' => 'required|digits:6'
        ]);    
    

        $data=[
            'name' => $request->name,
            'pincode' => $request->pincode,
           
        ];

        $result=Pincode::create($data);
        return redirect(route('pincode.list'))->with('success', 'Pincode Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Pincode";
        $subtitle="Pincode";
        $activePage = "Pincode";
        $navbars=Pincode::where('id',$id)->first();
          return view('admin.pincode.edit',compact('title','navbars','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'pincode' => 'required|digits:6'
          
        ]);   

        $data=[
            'name' => $request->name,
            'pincode' => $request->pincode,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
   
    $result=Pincode::where('id',$id)->update($data);
    return redirect(route('pincode.list'))->with('success', 'Pincode Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = Pincode::where('id', $id)->delete();
        if ($delete){
              return redirect()->back()->with('success','Pincode Deleted Successfully!');
              
            }
            else
                {
                    return ['success' => 0, 'Error Occured!'];
             
                }
     
    }
}
