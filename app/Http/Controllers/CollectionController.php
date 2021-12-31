<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
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
        $products = json_decode(json_encode(Product::select('products.*','users.name as user_name')->join('users','users.id','products.user_id')->get()), true);
        $users = json_decode(json_encode(User::get()), true);
        return view('admin.collections.add', compact('title', 'activePage', 'subtitle','products','categories','users'));
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

        $product_id = implode(',',$request->product_id);
        $product_collection_type = implode(',',$request->product_collection_type);

        $collections = new Collection();
        $collections->category_id = $request->category_id;
        $collections->name = $request->name;
        $collections->slug =  Str::slug($request->name);
        $collections->status = $request->status;
        $collections->product_id        = $product_id;
        $collections->product_collection_type        = $product_collection_type;
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
        $products = json_decode(json_encode(Product::select('products.*','users.name as user_name')->join('users','users.id','products.user_id')->get()), true);
        $categories = Category::all();
        return view('admin.collections.edit', compact('title', 'collection', 'activePage', 'subtitle', 'id','products','categories'));
    }

    public function update(Request $request, $id)
    {
        $product_id = implode(',',$request->product_id);
        $product_collection_type = implode(',',$request->product_collection_type);
        
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
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'product_id' => $product_id,
                'product_collection_type' => $product_collection_type,
                'status' => $request->status,
                'img' =>  $image_name,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'product_id' => $product_id,
                'product_collection_type' => $product_collection_type,
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
