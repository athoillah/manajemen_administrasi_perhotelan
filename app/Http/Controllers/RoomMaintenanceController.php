<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomMaintenance;
use App\Models\Room;
use App\Models\Item;

class RoomMaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = RoomMaintenance::with('room', 'items')->get();
        return view('maintenance.index', compact('maintenances'));
    }

    public function create()
    {
        $rooms = Room::all();
        $items = Item::all(); // Mendapatkan daftar item untuk dikirim ke view
        return view('maintenance.create', compact('rooms', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'item_id' => 'required|array', // Validasi item sebagai array
            'status' => 'required|string',
            'scheduled_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $maintenance = RoomMaintenance::create([
            'room_id' => $request->room_id,
            'status' => $request->status,
            'scheduled_date' => $request->scheduled_date,
            'notes' => $request->notes,
        ]);
        // Menyimpan item yang dipilih dalam tabel pivot
        $maintenance->items()->attach($request->item_id);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance scheduled successfully.');
    }

    public function edit($id)
    {
        $maintenance = RoomMaintenance::with('items')->findOrFail($id);
        $rooms = Room::all();
        $items = Item::all(); // Mendapatkan daftar item untuk dikirim ke view
        return view('maintenance.edit', compact('maintenance', 'rooms', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'item_id' => 'required|array', // Validasi item sebagai array
            'status' => 'required|string',
            'scheduled_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $maintenance = RoomMaintenance::findOrFail($id);
        $maintenance->update([
            'room_id' => $request->room_id,
            'status' => $request->status,
            'scheduled_date' => $request->scheduled_date,
            'notes' => $request->notes,
        ]);

        // Sinkronisasi item yang dipilih dengan tabel pivot
        $maintenance->items()->sync($request->item_id);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance updated successfully.');
    }

    public function destroy($id)
    {
        $maintenance = RoomMaintenance::findOrFail($id);
        $maintenance->items()->detach(); // Hapus relasi dengan item di tabel pivot
        $maintenance->delete(); // Hapus pemeliharaan
        return redirect()->route('maintenance.index')->with('success', 'Maintenance deleted successfully.');
    }
}
