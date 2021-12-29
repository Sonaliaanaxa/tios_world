<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCollection;
use App\Models\Collection;
use App\Product;

class CustomCollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Product Collections";
        $subtitle = "Collections";
        $activePage = "ProductCollections";
        $cCount = ProductCollection::select('*')->count();
        $collections = ProductCollection::select('product_collections.*', 'products.name as product_name', 'collections.name as collection_name')
            ->join('products', 'products.id', 'product_collections.product_id')
            ->join('collections', 'collections.id', 'product_collections.collection_id')
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(30);
        return view('admin.product_collections.list', compact('title', 'collections', 'activePage', 'subtitle', 'cCount'));
    }
    public function create()
    {
        $title = "Create New Product Collections";
        $subtitle = "Collections";
        $activePage = "ProductCollections";
        $collections =  Collection::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        return view('admin.product_collections.add', compact('title', 'activePage', 'subtitle', 'collections', 'products'));
    }

    public function save(Request $request)
    {
        $this->validate(request(), [
            'collection_id' => 'required',
            'product_id' => 'required',
            'status' => 'required'
        ]);

        $collections = new ProductCollection();
        $collections->collection_id = $request->collection_id;
        $collections->status = $request->status;
        $data                   = array();
        $data       = $request->product_id;
        $collections->product_id        = json_encode($data);
        $collections->save();

        return redirect(route('product-collections.list'))->with('success', 'Product Collection Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Update Product Collection";
        $subtitle = "Collection";
        $activePage = "ProductCollections";
        $productCollection = ProductCollection::where('id', $id)->first();
        $collections =  Collection::where('status', '1')->get();
        $products = Product::where('status', '1')->get();
        return view('admin.product_collections.edit', compact('title', 'productCollection', 'activePage', 'subtitle', 'id', 'products', 'collections'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'collection_id' => 'required',
            'product_id' => 'required',
            'status' => 'required'
        ]);
        $data = [
            'collection_id' => $request->collection_id,
            'product_id' => $request->product_id,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $result = ProductCollection::where('id', $id)->update($data);
        return redirect(route('product-collections.list'))->with('success', 'Product Collection Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $delete = ProductCollection::where('id', $id)->delete();
        if ($delete) {


            return ['success' => 1, 'Product Collection Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
