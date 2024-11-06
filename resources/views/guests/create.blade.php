@extends('layouts.app')

@section('content')
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3>Add New Guest</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('guests.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Guest</button>
                </form>
            </div>
        </div>
    </div>
@endsection
