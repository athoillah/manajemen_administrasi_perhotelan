<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HousekeepingSchedule;
use App\Models\Room;

class HousekeepingScheduleController extends Controller
{
    public function index()
    {
        $schedules = HousekeepingSchedule::with('room')->get();
        return view('housekeeping.index', compact('schedules'));
    }

    public function create()
    {
        $rooms = Room::all(); // Daftar kamar untuk dipilih
        return view('housekeeping.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'scheduled_date' => 'required|date',
            'area' => 'required|string',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        HousekeepingSchedule::create($request->all());
        return redirect()->route('housekeeping.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = HousekeepingSchedule::findOrFail($id);
        $rooms = Room::all();
        return view('housekeeping.edit', compact('schedule', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'scheduled_date' => 'required|date',
            'area' => 'required|string',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $schedule = HousekeepingSchedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->route('housekeeping.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        HousekeepingSchedule::destroy($id);
        return redirect()->route('housekeeping.index')->with('success', 'Schedule deleted successfully.');
    }
}
