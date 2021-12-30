<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;
use App\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

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
        $products = Product::select('products.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
            $categories = Category::all();
        return view('admin.products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount','categories'));
    }

    public function indexSeller()
    {
        $title = "Products";
        $subtitle = "Products";
        $activePage = "Products";
        $pCount = Product::select('*')->where('user_id', Auth::user()->id)->count();
        $products = Product::select('products.*')
            ->where('products.user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        $categories = Category::all();
        return view('admin.products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount','categories'));
    }


    public function create()
    {
        $title = "Create New Products";
        $subtitle = "Products";
        $activePage = "Products";

        $categories = Category::get();
        $category_id = $categories[0]->id ?? '';
        $subcategories = json_decode(json_encode(Subcategory::get()), true);
        $units = Unit::where('status','1')->get();

        return view('admin.products.add', compact('title', 'activePage', 'subtitle', 'categories', 'subcategories','units'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'category_id' => 'required',
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
            'origin' => 'required',
            'type' => 'required',
            'certification' => 'required',
            'status' => 'required'

        ]);


        $map_name = '';
        if ($request->hasFile('myMap')) {
            $file = $request->file('myMap');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $map_name = 'product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/map');
                $file->move($destinationPath, $map_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        $image_name = '';

        if ($request->hasFile('myFrontImage')) {
            $file = $request->file('myFrontImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $image_name = 'product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $back_image_name = '';

        if ($request->hasFile('myBackImage')) {
            $file = $request->file('myBackImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $back_image_name = 'product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $back_image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        $image1 = '';

        if ($request->hasFile('myImage1')) {
            $file = $request->file('myImage1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $image1 = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $image1);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $image2 = '';

        if ($request->hasFile('myImage2')) {
            $file = $request->file('myImage2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $image2 = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $image2);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $image3 = '';

        if ($request->hasFile('myImage3')) {
            $file = $request->file('myImage3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $image3 = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $image3);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $image4 = '';

        if ($request->hasFile('myImage4')) {
            $file = $request->file('myImage4');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $image4 = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $image4);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }


        $product = new Product();
        $product->category_id = $request->category_id;
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
        $product->origin = $request->origin;
        $product->type = $request->type;
        $product->certification = $request->certification;
        $product->map = $request->map;
        $product->status = $request->status;
        $product->is_show = $request->is_show;
        $product->user_id = Auth::user()->id;
        $product->upload_image = $image_name;
        $product->back_image = $back_image_name;
        $product->image1 = $image1;
        $product->image2 = $image2;
        $product->image3 = $image3;
        $product->image4 = $image4;
        $product->map = $map_name;
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

        $categories = Category::orderby('name', 'asc')->get();
     
       
        $subcategories = Subcategory::get();

        $product = Product::select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->first();
        $products = Product::select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->get();

        $units = Unit::where('status','1')->get(); 
        return view('admin.products.edit', compact('title', 'categories', 'product', 'activePage', 'subtitle', 'id', 'subcategories', 'categories','products','units'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'category_id' => 'required',
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
            'origin' => 'required',
            'type' => 'required',
            'certification' => 'required',
            'status' => 'required'

        ]);

        $id = $request->id;
        $data1['map'] = '';

        if ($request->hasFile('myMap')) {
            $file = $request->file('myMap');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data1['map'] = 'maps_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/map');
                $file->move($destinationPath,  $data1['map']);
                Product::where('id', $id)->update($data1);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data2['upload_image'] = '';

        if ($request->hasFile('myFrontImage')) {
            $file = $request->file('myFrontImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data2['upload_image'] = 'products_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $data2['upload_image']);
                Product::where('id', $id)->update($data2);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data3['back_image'] = '';

        if ($request->hasFile('myBackImage')) {
            $file = $request->file('myBackImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data3['back_image'] = 'products_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/products');
                $file->move($destinationPath, $data3['back_image']);
                Product::where('id', $id)->update($data3);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        

        $data4['image1'] = '';

        if ($request->hasFile('myImage1')) {
            $file = $request->file('myImage1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data4['image1'] = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $data4['image1']);
                Product::where('id', $id)->update($data4);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        
        $data5['image2'] = '';

        if ($request->hasFile('myImage2')) {
            $file = $request->file('myImage2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data5['image2'] = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $data5['image2']);
                Product::where('id', $id)->update($data5);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        
        $data6['image3'] = '';

        if ($request->hasFile('myImage3')) {
            $file = $request->file('myImage3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data6['image3'] = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $data6['image3']);
                Product::where('id', $id)->update($data6);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        
        $data7['image4'] = '';

        if ($request->hasFile('myImage4')) {
            $file = $request->file('myImage4');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif' || $extension == 'json') {
                $data7['image4'] = 'gallery_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/gallery');
                $file->move($destinationPath, $data7['image4']);
                Product::where('id', $id)->update($data7);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        
      
      
            $data = [
                'category_id' => $request->category_id,
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
                'origin' => $request->origin,
                'type' => $request->type,
                'certification' => $request->certification,
                'short_details' => $request->short_details,
                'details' => $request->details,
                'status' => $request->status,
                'is_show' => $request->is_show,
                'user_id' => Auth::user()->id,
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
    public function requestStatusUpdate(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }
}
