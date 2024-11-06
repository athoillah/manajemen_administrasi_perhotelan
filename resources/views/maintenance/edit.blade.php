@extends('layouts.app')

@section('content')
    <h1>Edit Room Maintenance</h1>

    <form action="{{ route('maintenance.update', $maintenance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-select" required>
                <option value="">Select Room</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $maintenance->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->room_number }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- Items for Maintenance -->
        <div class="mb-3">
            <label class="form-label">Items for Maintenance</label>
            <div class="form-check">
                @foreach ($items as $item)
                    <div>
                        <input type="checkbox" name="item_id[]" value="{{ $item->id }}" class="form-check-input"
                            id="item-{{ $item->id }}" {{ $maintenance->items->contains($item->id) ? 'checked' : '' }}>
                        <label for="item-{{ $item->id }}" class="form-check-label">{{ $item->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Scheduled" {{ $maintenance->status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                <option value="In Progress" {{ $maintenance->status == 'In Progress' ? 'selected' : '' }}>In Progress
                </option>
                <option value="Completed" {{ $maintenance->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="scheduled_date" class="form-label">Scheduled Date</label>
            <input type="date" name="scheduled_date" id="scheduled_date" class="form-control"
                value="{{ $maintenance->scheduled_date }}" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea name="notes" id="notes" class="form-control">{{ $maintenance->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Maintenance</button>
    </form>
@endsection
