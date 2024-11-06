<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('room_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:room_types,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        RoomType::create($request->all());

        return redirect()->route('room_types.index')->with('success', 'Room type added successfully.');
    }

    // Menampilkan form edit untuk room type
    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('room_types.edit', compact('roomType'));
    }

    // Memperbarui room type yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:room_types,name,' . $id,
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->all());
        return redirect()->route('room_types.index')->with('success', 'Room type updated successfully.');
    }

    // Menghapus room type
    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();
        return redirect()->route('room_types.index')->with('success', 'Room type deleted successfully.');
    }
}
