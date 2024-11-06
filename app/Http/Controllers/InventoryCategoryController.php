<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryCategory;

class InventoryCategoryController extends Controller
{
    public function index()
    {
        $categories = InventoryCategory::all();
        return view('inventory_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('inventory_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:inventory_categories,name',
            'description' => 'nullable|string',
        ]);

        InventoryCategory::create($request->all());

        return redirect()->route('inventory_categories.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = InventoryCategory::findOrFail($id);
        return view('inventory_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:inventory_categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = InventoryCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('inventory_categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        InventoryCategory::destroy($id);

        return redirect()->route('inventory_categories.index')->with('success', 'Category deleted successfully.');
    }
}
