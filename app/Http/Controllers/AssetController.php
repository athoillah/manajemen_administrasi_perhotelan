<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetCategory;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with('category')->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $categories = AssetCategory::all();
        return view('assets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:asset_categories,id',
            'serial_number' => 'nullable|string|unique:assets,serial_number',
            'value' => 'nullable|numeric',
            'purchase_date' => 'nullable|date',
            'condition' => 'nullable|string',
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset added successfully.');
    }

    public function edit($id)
    {
        $asset = Asset::findOrFail($id);
        $categories = AssetCategory::all();
        return view('assets.edit', compact('asset', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:asset_categories,id',
            'serial_number' => 'nullable|string|unique:assets,serial_number,' . $id,
            'value' => 'nullable|numeric',
            'purchase_date' => 'nullable|date',
            'condition' => 'nullable|string',
        ]);

        $asset = Asset::findOrFail($id);
        $asset->update($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset updated successfully.');
    }

    public function destroy($id)
    {
        Asset::destroy($id);

        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully.');
    }
}
