<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Brand";
        $subtitle = "Brand";
        $activePage = "Brand";
        $cCount = Brand::select('*')->count();
        $categories = Brand::select('brands.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(10);
        return view('admin.brands.list', compact('title', 'categories', 'activePage', 'subtitle', 'cCount'));
    }



    public function create()
    {
        $title = "Create New Brand";
        $subtitle = "Brand";
        $activePage = "Brand";
        return view('admin.brands.add', compact('title', 'activePage', 'subtitle'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name = 'brands_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/brands');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data = [
            'name' => $request->name,
            'img' =>  $image_name
        ];

        $result = Brand::create($data);
        return redirect(route('brands.list'))->with('success', 'Brand Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Brand";
        $subtitle = "Brand";
        $activePage = "Brand";
        $category = Brand::where('id', $id)->first();
        return view('admin.brands.edit', compact('title', 'category', 'activePage', 'subtitle', 'id'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required'

        ]);

        $image_name = '';

        if ($request->hasFile('myImage')) {
            $file = $request->file('myImage');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name = 'brands_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/brands');
                $file->move($destinationPath, $image_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }

            $data = [
                'name' => $request->name,
                'img' =>  $image_name,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'name' => $request->name,
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        $result = Brand::where('id', $id)->update($data);
        return redirect(route('brands.list'))->with('success', 'Brand Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;

        $delete = Brand::where('id', $id)->delete();
        if ($delete) {


            return ['success' => 1, 'Brand Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
