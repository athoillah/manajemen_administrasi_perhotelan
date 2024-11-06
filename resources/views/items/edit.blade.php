@extends('layouts.app')

@section('content')
    <h1>Edit Item</h1>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $item->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
    </form>
@endsection
