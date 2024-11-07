@extends('layouts.app')

@section('content')
    <h1>Edit Asset</h1>

    <form action="{{ route('assets.update', $asset->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Asset Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $asset->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $asset->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="serial_number" class="form-label">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control"
                value="{{ $asset->serial_number }}">
        </div>

        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="number" name="value" id="value" class="form-control" step="0.01"
                value="{{ $asset->value }}">
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-control"
                value="{{ $asset->purchase_date }}">
        </div>

        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select name="condition" id="condition" class="form-select" required>
                <option value="Good" {{ $asset->condition == 'Good' ? 'selected' : '' }}>Good</option>
                <option value="Needs Repair" {{ $asset->condition == 'Needs Repair' ? 'selected' : '' }}>Needs Repair
                </option>
                <option value="Damaged" {{ $asset->condition == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                <option value="Lost" {{ $asset->condition == 'Lost' ? 'selected' : '' }}>Lost</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Asset</button>
        <a href="{{ route('assets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
