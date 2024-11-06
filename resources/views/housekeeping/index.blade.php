@extends('layouts.app')

@section('content')
    <h1>Housekeeping Schedules</h1>
    <a href="{{ route('housekeeping.create') }}" class="btn btn-primary mb-3">Add Schedule</a>

    <table class="table table-striped table-bordered" id="housekeepingTable">
        <thead>
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
                        <a href="{{ route('housekeeping.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('housekeeping.destroy', $schedule->id) }}" method="POST"
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
@endsection

@push('scripts')
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#housekeepingTable').DataTable({
                "order": [
                    [1, "asc"]
                ],
                "columnDefs": [{
                    "orderable": true,
                    "targets": [1, 3]
                }]
            });
        });
    </script>
@endpush
