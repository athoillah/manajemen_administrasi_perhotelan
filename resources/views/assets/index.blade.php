@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Assets</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('assets.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add New Asset
                    </a>
                </div>
            </div>

            <div class="card-body p-2">
                <table class="table table-hover table-striped table-bordered mb-0" id="shortTable">
                    <thead class="table-light">
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
                                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
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
