@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="col-md-9">
                    <h3>Guests</h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('guests.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New
                        Guest</a>
                </div>
            </div>

            <div class="card-body p-2">
                <table class="table table-hover table-striped table-bordered mb-0" id="shortTable">
                    <thead class="table-light">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $guest->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $guest->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $guest->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $guest->id }}">
                                                        Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this guest: "{{ $guest->name }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('guests.destroy', $guest->id) }}"
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
    </div>
@endsection
