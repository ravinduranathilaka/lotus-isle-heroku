<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class PackageController extends Controller {
    public function index() {
        return view('admin.packages.index', [
            'packages' => Package::with('category')->get(),
            'categories' => Category::all(),
        ]);
    }

    public function create() {
        // form to create a package
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
        ]);

        Package::create($validated);

        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully.');
    }

    public function edit(Package $package) {
        // show form to edit package
    }

    public function update(Request $request, Package $package) {
        // update package
    }

    public function destroy(Package $package) {
        $package->delete();
        return redirect()->back();
    }

    public function userIndex(Request $request) {
        $query = Package::with('category');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
            });
        }

        return view('customer.packages', [
            'packages' => $query->get(),
        ]);
    }
}