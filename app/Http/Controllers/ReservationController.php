<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;


class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['guest', 'room'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $guests = Guest::all();
        $rooms = Room::where('is_available', true)->get();
        return view('reservations.create', compact('guests', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $guests = Guest::all();
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'guests', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
