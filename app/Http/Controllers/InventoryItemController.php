<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;
use App\Models\InventoryCategory;

class InventoryItemController extends Controller
{
    public function index()
    {
        $items = InventoryItem::with('category')->get();
        return view('inventory_items.index', compact('items'));
    }

    public function create()
    {
        $categories = InventoryCategory::all();
        return view('inventory_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'nullable|exists:inventory_categories,id',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'last_restocked' => 'nullable|date',
        ]);

        InventoryItem::create($request->all());

        return redirect()->route('inventory_items.index')->with('success', 'Item added successfully.');
    }

    public function edit($id)
    {
        $item = InventoryItem::findOrFail($id);
        $categories = InventoryCategory::all();
        return view('inventory_items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'nullable|exists:inventory_categories,id',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'last_restocked' => 'nullable|date',
        ]);

        $item = InventoryItem::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('inventory_items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        InventoryItem::destroy($id);

        return redirect()->route('inventory_items.index')->with('success', 'Item deleted successfully.');
    }
}
