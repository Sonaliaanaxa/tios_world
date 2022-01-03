<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variation;

class VariationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Variations";
        $subtitle = "Variations";
        $activePage = "Variations";
        $cCount = Variation::select('*')->count();
        $categories = Variation::select('variations.*')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(10);
        return view('admin.variations.list', compact('title', 'categories', 'activePage', 'subtitle', 'cCount'));
    }


    public function create()
    {
        $title = "Create New Variation";
        $subtitle = "Variations";
        $activePage = "Variations";
        return view('admin.variations.add', compact('title', 'activePage', 'subtitle'));
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

        $result = Variation::create($data);
        return redirect(route('variations.list'))->with('success', 'Variations Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Variation";
        $subtitle = "Variation";
        $activePage = "Variations";
        $category = Variation::where('id', $id)->first();
        return view('admin.variations.edit', compact('title', 'category', 'activePage', 'subtitle', 'id'));
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

        $result = Variation::where('id', $id)->update($data);
        return redirect(route('variations.list'))->with('success', 'Variation Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Variation::where('id', $id)->delete();
        if ($delete) {


            return ['success' => 1, 'Variation Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
