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
            ->join('subcategories','products.subcategory_id','subcategories.id')
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

        return view('admin.products.add', compact('title', 'activePage', 'subtitle', 'categories','subcategories'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'purchase_bitcoin' => 'required',
            'selling_bitcoin' => 'required',
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

        $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'purchase_bitcoin' => $request->purchase_bitcoin,
            'selling_bitcoin' => $request->selling_bitcoin,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'weight' => $request->weight,
            'unit' => $request->unit,
            'current_stock'=> $request->current_stock,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'status' => $request->status,
            'is_show' => $request->is_show,
            'user_id' => Auth::user()->id,
            'upload_image' =>  $image_name
        ];

        $result = Product::create($data);
        return redirect(route('products.list'))->with('success', 'Products Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Products";
        $subtitle = "Products";
        $activePage = "Products";

        $categories = Category::get();
        $subcategories = Subcategory::get();

        $product = Product::select('products.*', 'categories.name as category_name','subcategories.name as subcategory_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')

            ->first();
        return view('admin.products.edit', compact('title', 'categories', 'product', 'activePage', 'subtitle', 'id','subcategories', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'purchase_bitcoin' => 'required',
            'selling_bitcoin' => 'required',
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

            $data = [
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'purchase_bitcoin' => $request->purchase_bitcoin,
                'selling_bitcoin' => $request->selling_bitcoin,
                'discount' => $request->discount,
                'saving' => $request->saving,
                'tax_type' => $request->tax_type,
                'tax' => $request->tax,
                'tax_price' => $request->tax_price,
                'weight' => $request->weight,
                'unit' => $request->unit,
                'current_stock'=> $request->current_stock,
                'short_details' => $request->short_details,
                'details' => $request->details,
                'status' => $request->status,
                'is_show' => $request->is_show,
                'user_id' => Auth::user()->id,
                'upload_image' =>  $image_name,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'purchase_bitcoin' => $request->purchase_bitcoin,
            'selling_bitcoin' => $request->selling_bitcoin,
            'discount' => $request->discount,
            'saving' => $request->saving,
            'tax_type' => $request->tax_type,
            'tax' => $request->tax,
            'tax_price' => $request->tax_price,
            'weight' => $request->weight,
            'unit' => $request->unit,
            'current_stock'=> $request->current_stock,
            'short_details' => $request->short_details,
            'details' => $request->details,
            'status' => $request->status,
            'is_show' => $request->is_show,
            'user_id' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $result = Product::where('id', $id)->update($data);
        return redirect(route('products.list'))->with('success', 'Products Successfully Updated!');
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
