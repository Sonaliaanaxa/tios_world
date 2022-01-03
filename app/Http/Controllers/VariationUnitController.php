<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Variation;

class VariationUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
       $title = "Variation Units";
        $subtitle="Variation Units";
        $activePage = "Variation Units";
        $cCount=Unit::select('*')->join('variations','variations.id','units.variation_id')->count();
        $units=Unit::select('units.*', 'variations.name as variation_name')
                        ->join('variations','variations.id','units.variation_id')
                        ->orderBy('id','DESC')
                        ->sortable()->paginate(10);
      
        return view('admin.units.list',compact('title','units','activePage','subtitle','cCount'));
    }
  
    
  
    public function create()
    {
        $title = "Create New Units";
        $subtitle="Units";
        $activePage = "Variation Units"; 
        $variations = Variation::get();
        return view('admin.units.add',compact('title','activePage','subtitle','variations'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
           
            'variation_id' => 'required',
            'status' => 'required'
        ]);    
      
      
        $unit = new Unit();
        $unit->variation_id = $request->variation_id;
        if($request->color){
        $unit->name = $request->color;
        }
        else{
            $unit->name = $request->unit;
        }
       
        $unit->status = $request->status;
        $unit->save();

    
        return redirect(route('variation-units.list'))->with('success', 'Units Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Variation Unit";
        $subtitle="Variation Units";
        $activePage = "Variation Units";
        $units=Unit::where('id',$id)->first();
        $variations = Variation::get();
        return view('admin.units.edit',compact('title','variations','units','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'variation_id' => 'required',
            'status' => 'required'
        ]);    

  
        $data=[
            'variation_id' => $request->variation_id,
            'name' => $request->name,
            'status' => $request->status,
        ];
    $result=Unit::where('id',$id)->update($data);
    return redirect(route('variation-units.list'))->with('success', 'Units Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = Unit::where('id', $id)->delete();
        try {
            if ($delete){
                return redirect(route('variation-units.list'))->with('error', 'Unit Successfully Deleted!'); 
                }
            else
                {
                return redirect(route('variation-units.list'))->with('error', 'Error Occured!');
                }
            }
            catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('error','To delete this Subcategory first of all you need to delete all releted data to this Subcategory');
            }
     
    }
}
