<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $title = 'Categories';
        $categories = Category::all();
        return view('dashboard.category.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Category | Create';
        return view('dashboard.category.create', compact('title'));
    }

    function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required|max:255",
            'slug' => "required|unique:categories"
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/category')->with('success', 'New category has been added!');
    }

    public function edit(Category $category){
        $title = 'Category | Edit';
        return view('dashboard.category.edit', compact('title', 'category'));
    }

    public function update(Request $request, Category $category){
        $validatedData = $request->validate([
            'name' => "required|max:255",
            'slug' => "required|unique:categories"
        ]);

        Category::where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/category')->with('success', 'Category has been updated!');
    }

    public function destroy(Category $category){
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success', 'Category has been deleted!');
    }
}