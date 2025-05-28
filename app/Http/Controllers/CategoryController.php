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

        return view('category.category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.add-category');
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
            'cat_image' => 'nullable|mimes:png,jpeg,webp|max:100' // size in KB

        ]);
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
