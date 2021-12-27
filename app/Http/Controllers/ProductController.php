<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;
use App\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Products";
        $subtitle = "Products";
        $activePage = "Products";
        $pCount = Product::select('*')->count();
        $products = Product::select('products.*', 'categories.name as category_name','subcategories.name as subcategory_name')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount'));
    }

    public function indexSeller()
    {
        $title = "Products";
        $subtitle = "Products";
        $activePage = "Products";
        $pCount = Product::select('*')->where('user_id', Auth::user()->id)->count();
        $products = Product::select('products.*', 'categories.name as category_name','subcategories.name as subcategory_name')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->where('products.user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount'));
    }


    public function create()
    {
        $title = "Create New Products";
        $subtitle = "Products";
        $activePage = "Products";

        $categories = Category::get();
        $category_id = $categories[0]->id ?? '';
        $subcategories = json_decode(json_encode(Subcategory::get()), true);

        return view('admin.products.add', compact('title', 'activePage', 'subtitle', 'categories', 'subcategories'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [

            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'discount' => 'required',
            'saving' => 'required',
            'tax_type' => 'required',
            'tax' => 'required',
            'tax_price' => 'required',
            'weight' => 'required',
            'unit' => 'required',
            'current_stock' => 'required',
            'short_details' => 'required',
            'details' => 'required',
            'origin_details' => 'required',
            'product_collection_type' => 'required',
            'status' => 'required'

        ]);

        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image_name = 'product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $map_name = '';
        if ($request->hasFile('myMap')) {
            $file = $request->file('myMap');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $map_name = 'product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/map');
                $file->move($destinationPath, $map_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->name;
        $product->slug =  Str::slug($request->name);
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount = $request->discount;
        $product->saving = $request->saving;
        $product->tax_type = $request->tax_type;
        $product->tax = $request->tax;
        $product->tax_price = $request->tax_price;
        $product->weight = $request->weight;
        $product->unit = $request->unit;
        $product->current_stock = $request->current_stock;
        $product->short_details = $request->short_details;
        $product->details = $request->details;
        $product->origin_details = $request->origin_details;
        $product->map = $request->map;
        $product->status = $request->status;
        $product->is_show = $request->is_show;
        $product->user_id = Auth::user()->id;
        $product->upload_image = $image_name;
        $product->map = $map_name;
        $data                   = array();
        $data       = $request->product_collection_type;
        $product->product_collection_type        = json_encode($data);
        $product->save();
        // dd($product);

        if (Auth::user()->user_type == 'admin') {
            return redirect(route('products.list'))->with('success', 'Products Successfully Added!');
        }
        else{
            return redirect(route('seller-products.list'))->with('success', 'Products Successfully Added!');
        }
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Products";
        $subtitle = "Products";
        $activePage = "Products";

        $categories = Category::get();
        $subcategories = Subcategory::get();

        $product = Product::select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->first();
            $products = Product::select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->get();
          
        return view('admin.products.edit', compact('title', 'categories', 'product', 'activePage', 'subtitle', 'id', 'subcategories', 'categories','products'));
    }


    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'discount' => 'required',
            'saving' => 'required',
            'tax_type' => 'required',
            'tax' => 'required',
            'tax_price' => 'required',
            'weight' => 'required',
            'unit' => 'required',
            'current_stock' => 'required',
            'short_details' => 'required',
            'origin_details' => 'required',
            'details' => 'required',
            'status' => 'required'

        ]);

        $id = $request->id;
        $data1['upload_image'] = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data1['upload_image'] = 'products_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $data1['upload_image']);
                Product::where('id', $id)->update($data1);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        $id = $request->id;
        $data2['map'] = '';

        if ($request->hasFile('myMap')) {
            $file = $request->file('myMap');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data2['map'] = 'maps_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/map');
                $file->move($destinationPath,  $data2['map']);
                Product::where('id', $id)->update($data2);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        $data1 = array();
            $data = [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'discount' => $request->discount,
                'saving' => $request->saving,
                'tax_type' => $request->tax_type,
                'tax' => $request->tax,
                'tax_price' => $request->tax_price,
                'weight' => $request->weight,
                'unit' => $request->unit,
                'current_stock' => $request->current_stock,
                'short_details' => $request->short_details,
                'details' => $request->details,
                'status' => $request->status,
                'is_show' => $request->is_show,
                'user_id' => Auth::user()->id,
                'product_collection_type' => $data1['product_collection_type'],
                'updated_at' => date('Y-m-d H:i:s')
            ];
           
        $result = Product::where('id', $id)->update($data);
        if (Auth::user()->user_type == 'admin'){
            return redirect(route('products.list'))->with('success', 'Products Successfully Updated!');
        }
        else{
            return redirect(route('seller-products.list'))->with('success', 'Products Successfully Updated!');
        }
    }

    public function view(Request $request, $id)
    {
        $title = "View Products";
        $subtitle = "Products";
        $activePage = "Products";
        $product = Product::select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')

            ->first();
        return view('admin.products.view', compact('title', 'product', 'activePage', 'subtitle', 'id'));
    }



    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Product::where('id', $id)->delete();
        if ($delete) {
            return back()->with('error', 'Products Successfully Deleted!');
        } else {
            return back()->with('error', 'Error Occured!');
        }
    }
}
