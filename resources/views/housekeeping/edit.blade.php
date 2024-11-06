@extends('layouts.app')

@section('content')
    <h1>Edit Housekeeping Schedule</h1>

    <form action="{{ route('housekeeping.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-select">
                <option value="">Select Room</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $schedule->room_id == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="scheduled_date" class="form-label">Scheduled Date</label>
            <input type="date" name="scheduled_date" id="scheduled_date" class="form-control" value="{{ $schedule->scheduled_date }}" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area</label>
            <select name="area" id="area" class="form-select" required>
                <option value="Room" {{ $schedule->area == 'Room' ? 'selected' : '' }}>Room</option>
                <option value="Lobby" {{ $schedule->area == 'Lobby' ? 'selected' : '' }}>Lobby</option>
                <option value="Hallway" {{ $schedule->area == 'Hallway' ? 'selected' : '' }}>Hallway</option>
                <option value="Bathroom" {{ $schedule->area == 'Bathroom' ? 'selected' : '' }}>Bathroom</option>
                <option value="Gym" {{ $schedule->area == 'Gym' ? 'selected' : '' }}>Gym</option>
                <option value="Pool" {{ $schedule->area == 'Pool' ? 'selected' : '' }}>Pool</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Scheduled" {{ $schedule->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="In Progress" {{ $schedule->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $schedule->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" id="notes" class="form-control">{{ $schedule->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
@endsection
