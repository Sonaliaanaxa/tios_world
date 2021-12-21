<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnRefund;

class ReturnRefundController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Return Refund Policy";
      $subtitle="Return Refund Policy";
      $activePage = "RefundPolicy";
      $tCount=ReturnRefund::select('*')->count();
      $policies=ReturnRefund::select('return_refunds.*')
         ->orderBy('id','DESC')
      ->sortable()->paginate(20);
        return view('admin.return-refund.list',compact('title','policies','activePage','subtitle','tCount'));
    }
  
     public function create()
    {
        $title = "Create Privacy Policy";
        $subtitle="Privacy Policy";
        $activePage = "Privacy Policy"; 
          return view('admin.return-refund.add',compact('title','activePage','subtitle'));
    }
     public function save(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'details' => 'required'
        ]);   
         $data=[
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,           
        ];
        $result = ReturnRefund::create($data);
        return redirect(route('return-refund.list'))->with('success', 'Return Policy Successfully Added!');
    } 
  
    public function edit(Request $request, $id)
    {
        $title = "Update Return & Refund";
        $subtitle="Return & Refund";
        $activePage = "Return & Refund";
        $policies=ReturnRefund::where('id',$id)->first();
        return view('admin.return-refund.edit',compact('title','policies','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'details' => 'required',
          
        ]);   
        $data=[
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
            'updated_at'=>date('Y-m-d H:i:s')
        ];
       


    $result=ReturnRefund::where('id',$id)->update($data);
    return redirect(route('return-refund.list'))->with('success', 'Return Policy Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = Policy::where('id', $id)->delete();
        if ($delete){  
              return redirect()->back()->with('success','Policy Deleted Successfully!');
              
            }
            else
                {
                   return redirect()->back()->with('error','Error Occured!');
             
                }
     
    }
}
