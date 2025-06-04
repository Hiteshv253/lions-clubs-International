@extends('layouts.master')
@section('content')
<div class="container">
    <h2>{{ isset($state) ? 'Edit' : 'Add' }} State</h2>
    <form action="{{ isset($state) ? route('states.update', $state->id) : route('states.store') }}" method="POST">
        @csrf
        @if(isset($state)) @method('PUT') @endif
        <div class="mb-3">
            <label>State Name</label>
            <input type="text" name="name" value="{{ old('name', $state->name ?? '') }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('states.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
