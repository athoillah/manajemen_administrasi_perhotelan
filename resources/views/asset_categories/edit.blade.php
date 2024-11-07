@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('asset_categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('asset_categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
