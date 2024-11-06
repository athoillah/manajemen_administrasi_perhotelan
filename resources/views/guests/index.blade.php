@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-10">
                    <h3>Guests</h3>
                </div>
                <div class="col-md-2 text-end">
                    <a href="{{ route('guests.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New
                        Guest</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guests as $guest)
                            <tr>
                                <td>{{ $guest->name }}</td>
                                <td>{{ $guest->email }}</td>
                                <td>{{ $guest->phone }}</td>
                                <td>{{ $guest->address }}</td>
                                <td>
                                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="bi bi-trash"></i></button>
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
