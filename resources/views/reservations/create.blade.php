@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Add New Reservation</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="guest_id" class="form-label">Guest</label>
                        <select name="guest_id" id="guest_id" class="form-select" required>
                            <option value="">Select Guest</option>
                            @foreach ($guests as $guest)
                                <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="room_id" class="form-label">Room</label>
                        <select name="room_id" id="room_id" class="form-select" required>
                            <option value="">Select Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->room_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check-In Date</label>
                        <input type="date" name="check_in" id="check_in" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check-Out Date</label>
                        <input type="date" name="check_out" id="check_out" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Reservation</button>
                </form>
            </div>
        </div>
    </div>
@endsection
