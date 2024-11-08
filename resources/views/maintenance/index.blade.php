@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Room Maintenance</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('maintenance.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add Maintenance
                    </a>
                </div>
            </div>

            <div class="card-body p-2">
                <table class="table table-hover table-striped table-bordered mb-0" id="shortTable">
                    <thead class="table-light">
                        <tr>
                            <th>Room</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>Scheduled Date</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->room->room_number }}</td>
                                <td>{{ implode(', ', $maintenance->items->pluck('name')->toArray()) }}</td>
                                <!-- Menggabungkan nama item -->
                                <td>
                                    @if ($maintenance->status === 'Completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif ($maintenance->status === 'In Progress')
                                        <span class="badge bg-primary">In Progress</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Scheduled</span>
                                    @endif
                                </td>
                                <td>{{ $maintenance->scheduled_date }}</td>
                                <td>{{ $maintenance->notes }}</td>
                                <td>
                                    <a href="{{ route('maintenance.edit', $maintenance->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('maintenance.destroy', $maintenance->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
