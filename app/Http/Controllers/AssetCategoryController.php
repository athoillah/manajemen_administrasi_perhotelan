<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetCategory;

class AssetCategoryController extends Controller
{
    public function index()
    {
        $categories = AssetCategory::all();
        return view('asset_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('asset_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:asset_categories,name',
            'description' => 'nullable|string',
        ]);

        AssetCategory::create($request->all());

        return redirect()->route('asset_categories.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = AssetCategory::findOrFail($id);
        return view('asset_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:asset_categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = AssetCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('asset_categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        AssetCategory::destroy($id);

        return redirect()->route('asset_categories.index')->with('success', 'Category deleted successfully.');
    }
}
