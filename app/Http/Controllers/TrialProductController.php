<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrialProduct;

use App\Category;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class TrialProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Trial Products";
        $subtitle = "Trial Products";
        $activePage = "Trial Products";
        $pCount = TrialProduct::select('*')->count();
        $products = TrialProduct::select('trial_products.*', 'categories.name as category_name','subcategories.name as subcategory_name')
            ->join('categories', 'trial_products.category_id', 'categories.id')
            ->join('subcategories','trial_products.subcategory_id','subcategories.id')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.trial-products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount'));
    }

    public function indexSeller()
    {
        $title = "Trial Products";
        $subtitle = "Trial Products";
        $activePage = "Trial Products";
        $pCount = TrialProduct::select('*')->where('trial_products.user_id',Auth::user()->id)->count();
        $products = TrialProduct::select('trial_products.*', 'categories.name as category_name','subcategories.name as subcategory_name')
            ->join('categories', 'trial_products.category_id', 'categories.id')
            ->join('subcategories','trial_products.subcategory_id','subcategories.id')
            ->where('trial_products.user_id',Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.trial-products.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount'));
    }


    public function create()
    {
        $title = "Create New Trail Products";
        $subtitle = "Trail Products";
        $activePage = "Trail Products";

        $categories =Category::get();
        $category_id = $categories[0]->id ?? '';
        $subcategories = json_decode(json_encode(Subcategory::get()), true);

        return view('admin.trial-products.add', compact('title', 'activePage', 'subtitle', 'categories','subcategories'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'name' => 'required',
            'slug'=>'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'quantity'=>'required',
            'tios_points'=>'required',
            'weight' => 'required',

            'details' => 'required',
            'extra_details' => 'required',
            'status' => 'required'

        ]);
    
        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image_name = 'trail_product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/trial_products');
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
            'quantity'=>$request->quantity,
            'tios_points'=>$request->tios_points,
            'weight'=>$request->weight,
            'details' => $request->details,
            'extra_details' => $request->extra_details,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'upload_image' =>  $image_name
        ];
        $result = TrialProduct::create($data);
        // dd($data);
            return redirect()->back()->with('success', 'Trail Products Successfully Added!');
        
    }
 
    public function edit(Request $request, $id)
    {
        $title = "Update Trail Products";
        $subtitle = " Trail Products";
        $activePage = " Trail  Products";
        $categories = Category::get();
        $subcategories = Subcategory::get();

      $product =TrialProduct::select('trial_products.*', 'categories.name as category_name')
            ->where('trial_products.id', $id)
            ->join('categories', 'trial_products.category_id', 'categories.id')

            ->first();
        return view('admin.trial-products.edit', compact('title', 'product','categories', 'activePage', 'subtitle', 'id','subcategories', 'categories'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate(request(), [
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'tios_points' => 'required',
            'weight' => 'required',
           'details' => 'required',
            'extra_details' => 'required',
            'status' => 'required'

        ]);

    
        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image_name = 'trail_product_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/trial_products');
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
              'weight' => $request->weight,
               'quantity' => $request->quantity,
               'tios_points'=>$request->tios_points,
                 'details' => $request->details,
                'extra_details' => $request->extra_details,
                'user_id' => Auth::user()->id,
                'status' => $request->status,
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
            'weight' => $request->weight,
            'quantity' => $request->quantity,
            'tios_points'=>$request->tios_points,
            'details' => $request->details,
            'extra_details' => $request->extra_details,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $result = TrialProduct::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Trail Products Successfully Updated!');
    }

    public function view(Request $request, $id)
    {
        $title = "View Trail Products";
        $subtitle = "Trail Products";
        $activePage = "Trail Products";
        $product = TrialProduct::select('trail_products.*', 'categories.name as category_name')
            ->where('trail_products.id', $id)
            ->join('categories', 'trial_products.category_id', 'categories.id')

            ->first();
        return view('admin.trial-products.view', compact('title', 'product', 'activePage', 'subtitle', 'id'));
    }



    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete =TrialProduct::where('id', $id)->delete();
            if ($delete) {
                return back()->with('error', 'Trail Products Successfully Deleted!');
            } else {
                return back()->with('error', 'Error Occured!');
            }
    }
}
