@extends('layouts.app')

@section('content')
    <h1>Asset Responsibles</h1>
    <a href="{{ route('responsibles.create') }}" class="btn btn-primary mb-3">Add New Responsible</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Contact Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsibles as $responsible)
                <tr>
                    <td>{{ $responsible->name }}</td>
                    <td>{{ $responsible->department->name ?? 'N/A' }}</td>
                    <td>{{ $responsible->position }}</td>
                    <td>{{ $responsible->contact_info }}</td>
                    <td>
                        <a href="{{ route('responsibles.edit', $responsible->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('responsibles.destroy', $responsible->id) }}" method="POST"
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
