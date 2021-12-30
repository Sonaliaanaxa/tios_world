<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Category;
use App\Product;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Collections";
        $subtitle = "Collections";
        $activePage = "Collections";
        $cCount = Collection::select('*')->count();
        $collections = Collection::select('collections.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.collections.list', compact('title', 'collections', 'activePage', 'subtitle', 'cCount'));
    }
    public function create()
    {
        $title = "Create New Collections";
        $subtitle = "Collections";
        $activePage = "Collections";
        $categories = Category::all();
        $products = json_decode(json_encode(Product::get()), true);
      
        return view('admin.collections.add', compact('title', 'activePage', 'subtitle','products','categories'));
    }

    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required'
        ]);

        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {

                $image_name = 'collections_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/collections');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $collections = new Collection();
        $collections->name = $request->name;
        $collections->slug =  Str::slug($request->name);
        $collections->status = $request->status;
        $data                   = array();
        $data       = $request->product_id;
        $collections->product_id        = json_encode($data);
        $collections->img = $image_name;
        $collections->save();

        return redirect(route('collections.list'))->with('success', 'Collection Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Collection";
        $subtitle = "Collection";
        $activePage = "Collections";
        $collection = Collection::where('id', $id)->first();
        $products = Product::where('status', '1')->get();
        return view('admin.collections.edit', compact('title', 'collection', 'activePage', 'subtitle', 'id','products'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'product_id' => 'required',
            'status' => 'required'

        ]);
        $image_name = '';
        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name = 'collections_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/collections');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }

            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'product_id' => $request->product_id,
                'status' => $request->status,
                'img' =>  $image_name,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'product_id' => $request->product_id,
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $result = Collection::where('id', $id)->update($data);
        return redirect(route('collections.list'))->with('success', 'Collection Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;

        $delete = Collection::where('id', $id)->delete();
        if ($delete) {


            return ['success' => 1, 'Collection Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
