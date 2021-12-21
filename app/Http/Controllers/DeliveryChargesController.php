<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryCharge;

class DeliveryChargesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Delivery Charges";
      $subtitle="Delivery Charges";
      $activePage = "Delivery Charges";
      $products=DeliveryCharge::select('delivery_charges.*')->orderBy('id','DESC')->take(1)->get();

        return view('admin.delivery_charge.list',compact('title','products','activePage','subtitle'));
    }

    
  
    public function create()
    {
        $title = "Add Delivery charges";
        $subtitle="Delivery charges";
        $activePage = "Delivery charges"; 

          return view('admin.delivery_charge.add',compact('title','activePage','subtitle'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'delivery_charges' => 'required',
        ]);   

        $data=[
        
            'delivery_charges' => $request->delivery_charges,
        ];
       
       
        $result=DeliveryCharge::create($data);
        return redirect(route('delivery-charges.list'))->with('success', 'Delivery Charges Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Delivery charges";
        $subtitle="Delivery charges";
        $activePage = "Delivery charges";
   
        $product=DeliveryCharge::select('delivery_charges.*')
        ->where('delivery_charges.id',$id)
           ->first();
          return view('admin.delivery_charge.edit',compact('title','product','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
           'delivery_charges' => 'required',
           
        ]);
     

        $data=[
          
           'delivery_charges' => $request->delivery_charges,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    $result=DeliveryCharge::where('id',$id)->update($data);
    return redirect(route('delivery-charges.list'))->with('success', 'Delivery Charges Successfully Updated!');
    }

    

    public function destroy(Request $request)
    {
        $id=$request->id; 

        $delete = DeliveryCharge::where('id', $id)->delete();
        if ($delete){
            
            return response()->json(array('status'=>true,'message'=>'Delivery Charge Deleted Successfully!'));
              
            }
            else
                {
                    return response()->json(array('status'=>false,'message'=>'Error!'));
             
                }
     
    }
}
