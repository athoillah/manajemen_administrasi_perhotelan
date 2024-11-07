@extends('layouts.app')

@section('content')
    <h1>Edit Responsible Person</h1>

    <form action="{{ route('responsibles.update', $responsible->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $responsible->name }}" required>
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select name="department_id" id="department_id" class="form-select" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $responsible->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ $responsible->position }}"
                required>
        </div>

        <div class="mb-3">
            <label for="contact_info" class="form-label">Contact Info</label>
            <input type="text" name="contact_info" id="contact_info" class="form-control"
                value="{{ $responsible->contact_info }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Responsible</button>
        <a href="{{ route('responsibles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
