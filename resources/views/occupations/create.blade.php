@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create Occupation</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('occupations.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Occupation Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter occupation name" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Save</button>
                    <a href="{{ route('occupations.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
