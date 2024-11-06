@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Edit Room</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="room_type_id" class="form-label">Room Type</label>
                        <select name="room_type_id" id="room_type_id" class="form-select" required>
                            @foreach ($roomTypes as $roomType)
                                <option value="{{ $roomType->id }}"
                                    {{ $room->room_type_id == $roomType->id ? 'selected' : '' }}>
                                    {{ $roomType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="room_number" class="form-label">Room Number</label>
                        <input type="text" name="room_number" id="room_number" class="form-control"
                            value="{{ $room->room_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="is_available" class="form-label">Availability</label>
                        <select name="is_available" id="is_available" class="form-select" required>
                            <option value="1" {{ $room->is_available ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ !$room->is_available ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
