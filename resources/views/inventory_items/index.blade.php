@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Inventory Items</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('inventory_items.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add New Item
                    </a>
                </div>
            </div>

            <div class="card-body p-2">
                <table class="table table-hover table-striped table-bordered mb-0" id="shortTable">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Last Restocked</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->last_restocked }}</td>
                                <td>
                                    <a href="{{ route('inventory_items.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('inventory_items.destroy', $item->id) }}" method="POST"
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
