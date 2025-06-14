<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('inventory/productdetail');

        return view('inventory/product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('inventory/addproduct', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (Auth::user()->role->name != 'admin') {
            return back()->with('role_error', 'Only Admin can Add categories.');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],

            'price' => ['required', 'numeric', 'between:0,99999999.99'],
            'rollprice' => ['required', 'numeric', 'between:0,99999999.99'],
            'retailPrice' => ['required', 'numeric', 'between:0,99999999.99'],
            'wholesalePrice' => ['required', 'numeric', 'between:0,99999999.99'],

            'stock' => ['required', 'integer', 'min:0'],

            'category' => ['required', 'exists:categories,id'],

            // 'user_id' => ['required', 'exists:users,id'],

            'product_type' => ['required', 'in:0,1,2'], // if using product types

            'attribute_data' => ['nullable', 'json'],
            'variation_data' => ['nullable', 'json'],
            'description' => ['nullable', 'string'],
            'file' => 'nullable|mimes:png,jpeg,webp|max:1000' // size in KB

        ]);


        if (intval($request->product_type) === 0) {
            $request->attribute_data = json_encode([]);
            $request->variation_data = json_encode([]);
        } elseif (intval($request->product_type) === 1) {
            $request->variation_data = json_encode([]);
        }

        if (
            $request->rollprice <= $request->price ||
            $request->rollprice <= $request->retailPrice ||
            $request->rollprice <= $request->wholesalePrice
        ) {
            return back()->with('warning', 'Roll price should be greater than price, retail price, and wholesale price.');
        }

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'retail_price' => $request->retailPrice,
            'wholesale_price' => $request->wholesalePrice,
            'roll_price' => $request->rollprice,
            'stock' => $request->stock,
            'category_id' => $request->category,
            'image' => $path,  // size in KB
            'user_id' => Auth::id(),
            'description' => $request->description,
            'product_type' => $request->product_type, // if using product types
            'attributes' => $request->attribute_data,
            'variations' => $request->variation_data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'successfull added the product '.$request->name);
        // return back()->with('error', 'working...');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
