@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Housekeeping Schedules</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('housekeeping.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add Schedule
                    </a>
                </div>
            </div>
            <div class="card-body p-2">
                <table class="table table-striped table-bordered" id="shortTable">
                    <thead class="table-light">
                        <tr>
                            <th>Room</th>
                            <th>Scheduled Date</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->room ? $schedule->room->room_number : 'N/A' }}</td>
                                <td>{{ $schedule->scheduled_date }}</td>
                                <td>{{ $schedule->area }}</td>
                                <td>
                                    @if ($schedule->status === 'Completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif ($schedule->status === 'In Progress')
                                        <span class="badge bg-primary">In Progress</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Scheduled</span>
                                    @endif
                                </td>
                                <td>{{ $schedule->notes }}</td>
                                <td>
                                    <a href="{{ route('housekeeping.edit', $schedule->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $schedule->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $schedule->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $schedule->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $schedule->id }}">
                                                        Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this housekeeping schedule?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('housekeeping.destroy', $schedule->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
