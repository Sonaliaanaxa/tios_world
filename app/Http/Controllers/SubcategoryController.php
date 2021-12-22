<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
       $title = "Subcategory";
        $subtitle="Subcategory";
        $activePage = "Subcategory";
        $cCount=Subcategory::select('*')->count();
        $subcategories=Subcategory::select('subcategories.*', 'categories.name as category_name')
                        ->join('categories','categories.id','subcategories.category_id')
                        ->orderBy('id','DESC')
                        ->sortable()->paginate(10);
      
        return view('admin.subcategories.list',compact('title','subcategories','activePage','subtitle','cCount'));
    }
  
    
  
    public function create()
    {
        $title = "Create New Subcategory";
        $subtitle="Subcategory";
        $activePage = "Subcategory"; 
        $categories = Category::get();
        return view('admin.subcategories.add',compact('title','activePage','subtitle','categories'));
    }
  
    
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:subcategories',
            'status' => 'required'
        ]);    
        
    
        $data=[
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
        ];

        $result=Subcategory::create($data);
        return redirect(route('subcategories.list'))->with('success', 'Subcategory Successfully Added!');
    }
    
    public function edit(Request $request, $id)
    {
        $title = "Update Subcategory";
        $subtitle="Subcategory";
        $activePage = "Subcategory";
        $subcategories=Subcategory::where('id',$id)->first();
        $categories = Category::get();
          return view('admin.subcategories.edit',compact('title','categories','subcategories','activePage','subtitle','id'));
    }
  
    
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'status' => 'required'
          
        ]);   
  
        $data=[
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'updated_at'=>date('Y-m-d H:i:s')
        ];

    $result=Subcategory::where('id',$id)->update($data);
    return redirect(route('subcategories.list'))->with('success', 'Subcategory Successfully Updated!');
    }

    
    public function destroy(Request $request)
    {
        $id=$request->id; 
        $delete = Subcategory::where('id', $id)->delete();
        try {
            if ($delete){
                return redirect(route('subcategories.list'))->with('error', 'Subcategory Successfully Deleted!'); 
                }
            else
                {
                return redirect(route('subcategories.list'))->with('error', 'Error Occured!');
                }
            }
            catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('error','To delete this Subcategory first of all you need to delete all releted data to this Subcategory');
            }
     
    }
}
