@extends('layouts.app')

@section('content')
    <h1>Add New Asset</h1>

    <form action="{{ route('assets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Asset Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="serial_number" class="form-label">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="number" name="value" id="value" class="form-control" step="0.01">
        </div>
        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <input type="text" name="condition" id="condition" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save Asset</button>
        <a href="{{ route('assets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
