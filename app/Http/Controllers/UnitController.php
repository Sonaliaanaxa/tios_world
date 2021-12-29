<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Units";
        $subtitle = "Units";
        $activePage = "Unit";
        $cCount = Unit::select('*')->count();
        $categories = Unit::select('units.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(10);
        return view('admin.units.list', compact('title', 'categories', 'activePage', 'subtitle', 'cCount'));
    }


    public function create()
    {
        $title = "Create New Unit";
        $subtitle = "Unit";
        $activePage = "Unit";
        return view('admin.units.add', compact('title', 'activePage', 'subtitle'));
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        $result = Unit::create($data);
        return redirect(route('units.list'))->with('success', 'Units Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Unit";
        $subtitle = "Unit";
        $activePage = "Unit";
        $category = Unit::where('id', $id)->first();
        return view('admin.units.edit', compact('title', 'category', 'activePage', 'subtitle', 'id'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'status' => 'required',

        ]);
            $data = [
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s')
            ];

        $result = Unit::where('id', $id)->update($data);
        return redirect(route('units.list'))->with('success', 'Unit Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Unit::where('id', $id)->delete();
        if ($delete) {


            return ['success' => 1, 'Unit Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
