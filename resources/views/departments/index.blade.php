@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3 class="mb-0">Departments</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('departments.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Add New Department
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
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
