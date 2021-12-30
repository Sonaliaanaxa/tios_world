<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Category";
        $subtitle = "Category";
        $activePage = "Category";
        $cCount = Category::select('*')->count();
        $categories = Category::select('categories.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(10);
        return view('admin.categories.list', compact('title', 'categories', 'activePage', 'subtitle', 'cCount'));
    }



    public function create()
    {
        $title = "Create New Category";
        $subtitle = "Category";
        $activePage = "Category";
        return view('admin.categories.add', compact('title', 'activePage', 'subtitle'));
    }
    public function createCategory(Request $request)
    {
    
        $title = "Create New Category";
        $subtitle = "Category";
        $activePage = "Category";
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('admin.categories.add', compact('categories','title','subtitle','activePage'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'parent_id' =>$request->parent_id
            ]);

            return redirect(route('categories.list'))->with('success', 'Category has been created successfully.');
        }
    }

    // public function save(Request $request)
    // {
    //     $this->validate(request(), [
    //         'name' => 'required',
    //         'slug' => 'required|unique:categories',
    //     ]);

        

    //     $data = [
    //         'name' => $request->name,
    //         'user_id' => Auth::user()->id,
    //         'slug' => $request->slug,
           
    //     ];

    //     $result = Category::create($data);
    //     return redirect(route('categories.list'))->with('success', 'Category Successfully Added!');
    // }

    public function edit(Request $request, $id)
    {
        $title = "Update Category";
        $subtitle = "Category";
        $activePage = "Category";
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        
        $category = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('title', 'category', 'activePage', 'subtitle', 'id','categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'parent_id' => 'nullable|numeric'

        ]);
       
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'user_id' => Auth::user()->id,
            'parent_id' =>$request->parent_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];


        $result = Category::where('id', $id)->update($data);
        return redirect(route('categories.list'))->with('success', 'Category Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Category::where('id', $id)->delete();
        if ($delete) {
            return ['success' => 1, 'Category Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
