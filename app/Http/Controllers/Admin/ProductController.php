<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth, Validator;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::get()->toArray();
        return view('admin.products.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->user_id = Auth::user()->id;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        
        if($product->save()){
            return redirect()->route('admin.products')->with('success', 'Product added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function editProduct($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.add', compact('product','categories'));
    }

    public function update(ProductStoreRequest $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->user_id = Auth::user()->id;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        
        if($product->save()){
            return redirect()->route('admin.products')->with('success', 'Product update successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::find($id);
        if($product->delete())
        {
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
