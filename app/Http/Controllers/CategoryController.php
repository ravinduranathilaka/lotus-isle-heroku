<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create() {}

    public function store(Request $request) {
        // Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Create new category
    Category::create($validated);

    // Redirect back with success message
    return redirect()->route('admin.categories.index')->with('success', 'Category added!');
    }
    
    public function edit(Category $category) {}
    public function update(Request $request, Category $category) {}
    public function destroy(Category $category) {
        $category->delete();
        return redirect()->back();
    }
}
