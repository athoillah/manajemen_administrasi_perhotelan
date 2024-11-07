@extends('layouts.app')

@section('content')
    <h1>
        Assets</h1>
    <a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">Add New Asset</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Serial Number</th>
                <th>Value</th>
                <th>Purchase Date</th>
                <th>Condition</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $asset)
                <tr>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->category->name ?? 'N/A' }}</td>
                    <td>{{ $asset->serial_number }}</td>
                    <td>{{ $asset->value }}</td>
                    <td>{{ $asset->purchase_date }}</td>
                    <td>
                        @if ($asset->condition == 'Good')
                            <span class="badge bg-success">Good</span>
                        @elseif ($asset->condition == 'Needs Repair')
                            <span class="badge bg-warning text-dark">Needs Repair</span>
                        @elseif ($asset->condition == 'Damaged')
                            <span class="badge bg-danger">Damaged</span>
                        @elseif ($asset->condition == 'Lost')
                            <span class="badge bg-dark">Lost</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display:inline;">
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
