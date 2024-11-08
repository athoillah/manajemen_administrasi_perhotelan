@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Room Types</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('room_types.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add Room Type
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roomTypes as $roomType)
                            <tr>
                                <td>{{ $roomType->name }}</td>
                                <td>{{ $roomType->description }}</td>
                                <td>Rp. {{ number_format($roomType->price, 2) }}</td>
                                <td>
                                    <!-- Edit button -->
                                    <a href="{{ route('room_types.edit', $roomType->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Delete button with confirmation modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $roomType->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $roomType->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $roomType->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $roomType->id }}">Confirm
                                                        Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the room type "{{ $roomType->name }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('room_types.destroy', $roomType->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Confirmation Modal -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
