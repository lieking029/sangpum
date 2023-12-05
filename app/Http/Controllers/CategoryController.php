<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request) {

        Category::create($request->all());

        return redirect()->route('category.index');
    }

    public function show(Category $category) {

        return response()->json($category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update(['name' => $request->name]);

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }

}
