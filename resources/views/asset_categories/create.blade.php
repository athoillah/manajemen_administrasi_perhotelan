@extends('layouts.app')

@section('content')
    <h1>Add New Category</h1>

    <form action="{{ route('asset_categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="{{ route('asset_categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
