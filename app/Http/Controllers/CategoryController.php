<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);

        return view('category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('category.add-category',['data'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role->name != 'admin') {
            return back()->with('major_error', 'Only Admin can Add categories.');
        }

        $data = $request->validate([
            'name' => 'required|string|min:3|max:100|unique:categories,name',
            'p_category' => 'nullable|integer',
            'description' => 'nullable|string|max:300',
            'cat_image' => 'nullable|mimes:png,jpeg,webp|max:1000' // size in KB

        ]);
        $filename = null;
        if ($request->hasFile('cat_image')) {
            $filename = time() . '-' . $request->file('cat_image')->getClientOriginalName();
            $path = $request->file('cat_image')->storeAs('uploads', $filename, 'public');
        }

        Category::create([
            'name' => $request->name,
            'p_category' => $request->p_category,
            'description' => $request->description,
            'image' => $filename
        ]);

        // redirect()->route('category.create');

        return back()->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        // return view('upd-category',['id' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
