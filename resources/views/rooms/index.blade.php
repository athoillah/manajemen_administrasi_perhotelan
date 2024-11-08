@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Rooms</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add New Room
                    </a>
                </div>
            </div>
            <div class="card-body p-2">
                <table class="table table-hover table-striped table-bordered mb-0" id="shortTable">
                    <thead class="table-light">
                        <tr>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Availability</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->roomType->name }}</td>
                                <td>
                                    <span class="badge {{ $room->is_available ? 'bg-success' : 'bg-danger' }}">
                                        {{ $room->is_available ? 'Available' : 'Not Available' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <!-- Button to open delete confirmation modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $room->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Delete confirmation modal -->
                                    <div class="modal fade" id="deleteModal{{ $room->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $room->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $room->id }}">Confirm
                                                        Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the room "{{ $room->room_number }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete confirmation modal -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
