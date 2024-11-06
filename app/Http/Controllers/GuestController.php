<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    // Menampilkan daftar semua guest
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    // Menampilkan form untuk menambahkan guest baru
    public function create()
    {
        return view('guests.create');
    }

    // Menyimpan guest baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:guests',
            'phone' => 'required|string',
            'address' => 'nullable|string',
        ]);

        Guest::create($request->all());
        return redirect()->route('guests.index')->with('success', 'Guest added successfully.');
    }

    // Menampilkan form edit untuk guest
    public function edit($id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.edit', compact('guest'));
    }

    // Memperbarui guest yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:guests,email,' . $id,
            'phone' => 'required|string',
            'address' => 'nullable|string',
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());
        return redirect()->route('guests.index')->with('success', 'Guest updated successfully.');
    }

    // Menghapus guest
    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return redirect()->route('guests.index')->with('success', 'Guest deleted successfully.');
    }
}
