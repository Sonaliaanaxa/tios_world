<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Warehouse";
        $subtitle = "Warehouse";
        $activePage = "Warehouse";
        $pCount = Warehouse::select('*')->count();
        $products = Warehouse::select('warehouses.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.warehouse.list', compact('title', 'products', 'activePage', 'subtitle', 'pCount'));
    }



    public function create()
    {
        $title = "Create Warehouse";
        $subtitle = "Warehouse";
        $activePage = "Warehouse";

        $categories = Warehouse::get();
        return view('admin.warehouse.add', compact('title', 'activePage', 'subtitle', 'categories'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'contact_person_name' => 'required',
            'contact_person_no' => 'required',
            'address' => 'required',
            'pincode' => 'required|numeric',
            'status' => 'required'

        ]);

        $data = [
            'name' => $request->name,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_no' => $request->contact_person_no,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ];
        $result = Warehouse::create($data);
        return redirect(route('warehouse.list'))->with('success', 'Warehouse Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Warehouse";
        $subtitle = " Warehouse";
        $activePage = " Warehouse";
        $warehouse = Warehouse::select('warehouses.*')
            ->where('id', $id)
            ->first();
        return view('admin.warehouse.edit', compact('title', 'activePage', 'subtitle', 'id', 'warehouse'));
    }


    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'name' => 'required',
            'contact_person_name' => 'required',
            'contact_person_no' => 'required',
            'address' => 'required',
            'pincode' => 'required|numeric',
            'status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_no' => $request->contact_person_no,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
        ];

        $result = Warehouse::where('id', $id)->update($data);
        return redirect(route('warehouse.list'))->with('success', 'Warehouse Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Warehouse::where('id', $id)->delete();
        if ($delete) {
            return back()->with('error', 'Warehouse Successfully Deleted!');
        } else {
            return back()->with('error', 'Error Occured!');
        }
    }
}
