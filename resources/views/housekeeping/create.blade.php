@extends('layouts.app')

@section('content')
    <h1>Add Housekeeping Schedule</h1>

    <form action="{{ route('housekeeping.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-select">
                <option value="">Select Room</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="scheduled_date" class="form-label">Scheduled Date</label>
            <input type="date" name="scheduled_date" id="scheduled_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area</label>
            <select name="area" id="area" class="form-select" required>
                <option value="Room">Room</option>
                <option value="Lobby">Lobby</option>
                <option value="Hallway">Hallway</option>
                <option value="Bathroom">Bathroom</option>
                <option value="Gym">Gym</option>
                <option value="Pool">Pool</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Scheduled">Scheduled</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Schedule</button>
    </form>
@endsection
